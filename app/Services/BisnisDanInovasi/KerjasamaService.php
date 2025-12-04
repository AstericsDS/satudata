<?php

namespace App\Services\BisnisDanInovasi;

use Exception;
use App\Models\Synchronize;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class KerjasamaService {
    private $base_url;
    private $year;
    private $sync;
    public function __construct()
    {
        $this->base_url = config('api.sikerma_base_url');
        $this->year = now()->year;
        $this->sync = Synchronize::where('name', 'Kemitraan')->first();
    }
    public function getToken()
    {
        // CAUTION: Remove withoutVerifying if you found an answer to curl certificate problem
        $response = Http::withoutVerifying()->post($this->base_url . '/auth/login', [
            "email" => "satudata@unj.ac.id",
            "password" => "@5atU*7584"
        ]);
        $payload = $response->json();
        return $payload['access_token'];
        
    }
    public function synchronize()
    {
        try {
            $token = $this->getToken();
            
            for($i = $this->year-4; $i <= $this->year; $i++) {
                $response = Http::withToken($token)->withoutVerifying()->get($this->base_url . '/partnership/partner?tahun=' . $i);
                $data = $response->json();
    
                $rows = [];
                foreach($data['data'] as $item) {
                    $rows[] = [
                        'id' => $item['id'],
                        'tahun' => $i,
                        'nama_kerjasama' => $item['partnership']['nama'],
                        'nama_partner' => $item['description']['nama'],
                        'klasifikasi' => $item['description']['group']['klasifikasi'],
                        'negara' => $item['description']['negara'],
                        'tanggal_awal' => $item['partnership']['tanggal_awal'],
                        'tanggal_akhir' => $item['partnership']['tanggal_akhir'],
                        'status' => $item['partnership']['status']['status'],
                        'jenis_dokumen' => $item['partnership']['jenis_dokumen']['jenis_dok'],
                        'unit' => $item['partnership']['unit_info']['nama'],
                    ];
                }
                $chunks = array_chunk($rows, 200);
                foreach($chunks as $chunk) {
                    DB::table('kerjasama')->upsert(
                        $chunk,
                        ['id'],
                        ['nama_kerjasama', 'nama_partner', 'klasifikasi', 'negara', 'tanggal_awal', 'tanggal_akhir', 'status', 'jenis_dokumen', 'unit']
                    );
                }
                unset($item);
            }
            $this->sync->update(['status' => 'synchronized']);
        } catch (Exception $err) {
            $this->sync->update(['status' => 'error']);
            Log::error("Failed request on Kemitraan (SIKERMA)", ['request' => $this->base_url . '/partnership/partner?tahun=' . $i, 'tahun' => $i, 'error' => $err->getMessage()]);
        }
    }
}