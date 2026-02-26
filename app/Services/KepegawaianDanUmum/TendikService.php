<?php

namespace App\Services\KepegawaianDanUmum;

use Exception;
use App\Models\Synchronize;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class TendikService {
    private $sync;

    public function __construct()
    {
        $this->sync = Synchronize::where('name', 'Tendik')->first();
    }

    private function cleanString($string) {
        if (is_null($string)) {
            return null;
        }

        $string = preg_replace('/^[\pZ\pC]+|[\pZ\pC]+$/u', '', $string); 
        return trim($string);
    }

    public function synchronize() {
        if($this->sync) {
            $this->sync->update(['status' => 'synchronizing']);
        }

        try {
            $response = Http::withToken(config('api.sipeg_token'))->get(config('api.sipeg_base_url') . '/api/pegawai/all');
            $data = $response->json();
            $exclude_dosen = ['Dosen', 'Dosen Tetap', 'Dosen Tidak Tetap', 'PPPK_Dosen'];
            $rows = [];

            foreach($data['pegawais'] as $item) {
                if(!in_array($item['cabang'], $exclude_dosen)) {

                    // if(isset($item['ket_status']) && stripos($item['ket_status'], 'SPT') !== false) {
                    //     continue;
                    // }

                    // $jabatanClean = isset($item['ket_status']) ? $this->cleanString($item['ket_status']) : null;
                    // if ($jabatanClean) {
                    //      // menghapus karakter non-alfanumerik/non-spasi di awal string
                    //      $jabatanClean = preg_replace('/^[^a-zA-Z0-9\s]+/', '', $jabatanClean);
                    // }

                    $rows[] = [
                        'nama' => $item['nama'],
                        'nip' => $item['nip_baru'] ?? $item['nip1'],
                        'unit_kerja' => $item['unit_kerja'] ?: $item['homebase'],
                        'gelar_depan' => $item['gelar_depan'],
                        'gelar_belakang' => $item['gelar_belakang'],
                        'status_kepegawaian' => $item['cabang'],
                        'jabatan' => $item['jfu_akhir'],
                        'golongan' => $item['gol'],
                        'updated_at' => now(),
                        'created_at' => now(),
                    ];
                }
            }

            $chunks = array_chunk($rows, 200);
            foreach($chunks as $chunk) {
                DB::table('tendik')->upsert(
                    $chunk,
                    ['nama', 'nip'],
                    [
                        'unit_kerja',
                        'gelar_depan',
                        'gelar_belakang',
                        'golongan',
                        'updated_at'
                    ]
                );
            }

            if($this->sync) {
                $this->sync->update(['status' => 'synchronized']);
            }

        } catch(Exception $err) {
            if($this->sync) {
                $this->sync->update(['status' => 'error']);
            }
            Log::error('Failed request on Tendik (SIPEG)', ['error' => $err->getMessage()]);
        }
    }
}