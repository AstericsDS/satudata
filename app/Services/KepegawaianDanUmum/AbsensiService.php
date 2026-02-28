<?php

namespace App\Services\KepegawaianDanUmum;

use App\Models\Absensi;
use App\Models\Synchronize;
use Exception;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AbsensiService {
    private $sync;
    private $data;
    private $data_wfa;

    public function __construct()
    {
        $this->sync = Synchronize::firstOrCreate(['name' => 'Absensi Pegawai'], ['status' => 'unsynchronized']);
    }

    public function synchronize()
    {
        if($this->sync) {
            $this->sync->update(['status' => 'synchronizing']);
        }

        try {
            $response = Http::withoutVerifying()
                              ->withToken(config('api.dasi_token'))
                              ->post(config('api.dasi_base_url') . '/absen-dasi.php');
            $responseWfa = Http::withoutVerifying()->withToken(config('api.buk_token'))->post(config('api.buk_base_url') . '/absen-dasi.php');
            $this->data_wfa = $responseWfa->json();
            $this->data = $response->json();
            if($response->successful() && $responseWfa->successful() && isset($this->data['data']) && isset($this->data_wfa['data'])) {
                if(Cache::get('absensi')) {
                    Cache::forget('absensi');
                }
                Cache::remember('absensi', 86500, function() {
                    return [
                        'date' => $this->data['date'],
                        'total_pegawai_aktif' => $this->data['total_pegawai_aktif'],
                        'total_absen_hari_ini' => $this->data['total_absen_hari_ini'],
                        'total_pegawai_wfa' => $this->data_wfa['data']['total'],
                        'total_pegawai_tidak_hadir' => $this->data['total_pegawai_aktif'] - $this->data['total_absen_hari_ini'] - $this->data_wfa['data']['total'],
                    ];
                });
                DB::table('absensi')->truncate();
                $rows = [];
                foreach($this->data['data'] as $item) {
                    $rows[] = [
                        'nama' => $item['nama'],
                        'unit_kerja' => $item['unit_kerja'],
                        'cabang' => $item['cabang'],
                        'checktime' => $item['checktime'],
                    ];
                }
                Absensi::upsert(
                    $rows,
                    ['nama', 'unit_kerja'],
                    ['cabang', 'checktime']
                );
                
                if($this->sync) {
                    $this->sync->update(['status' => 'synchronized']);
                }
            } else {
                throw new Exception("Unexpected response from DASI: " . $response->body());
            }
        } catch (Exception $err) {
            if($this->sync) {
                $this->sync->update(['status' => 'error']);
            }
            Log::error("Failed request on DASI", ['error' => $err->getMessage()]);
        }
    }
}