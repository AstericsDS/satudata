<?php

namespace App\Services\AkademikDanMahasiswa;

use App\Models\Synchronize;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class TracerStudyService
{
    private $base_url;
    private $month;
    private $year;
    private $sync;
    public function __construct()
    {
        $this->base_url = config('api.tracer_study_base_url');
        $this->month = now()->month;
        $this->year = $this->month >= 10 ? now()->year : now()->year - 1;
        $this->sync = Synchronize::where('name', 'Tracer Study')->first();
    }
    public function eskra()
    {
        return [
            $this->base_url,
            $this->month,
            $this->year,
        ];
    }
    public function getToken()
    {
        $response = Http::post($this->base_url . '/login', [
            "email" => "apitracer@gmail.com",
            "password" => "UNJTr@C3rStudY"
        ]);
        $payload = $response->json();
        return $payload['token'];
    }
    public function syncEksporData()
    {
        $token = $this->getToken();
        try {
            for ($i = $this->year - 7; $i <= $this->year; $i++) {
                $response = Http::withHeaders(
                    [
                        "Authorization" => "Bearer $token"
                    ]
                )->get($this->base_url . '/ekspor/data?tahun=' . $i);



                $data = $response->json();
                if (!isset($data['data'])) {
                    Log::error("Invalid API response", ['year' => $i, 'status' => $response->status(), 'body' => $response->body()]);
                    continue;
                }

                $rows = [];

                foreach ($data['data'] as $item) {
                    $rows[] = [
                        'nama' => $item['nama'],
                        'nim' => $item['nim'],
                        'fakultas' => $item['fakultas'],
                        'prodi' => $item['prodi'],
                        'tahun_lulus' => $item['tahun_lulus'],
                        'status_pekerjaan' => $item['status_pekerjaan'],
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }

                $chunks = array_chunk($rows, 200);
                foreach ($chunks as $chunk) {
                    DB::table('tracer_studies')->upsert(
                        $chunk,
                        ['nama', 'nim'],
                        ['status_pekerjaan']
                    );
                }

            }
        } catch (\Exception $err) {
            Log::error("Tracer data failed in /ekspor/data", ['tahun' => $i, 'error' => $err->getMessage()]);
        }
    }
    public function syncStudiLanjut()
    {
        $token = $this->getToken();
        try {
            for ($i = $this->year - 7; $i <= $this->year; $i++) {
                $response = Http::withHeaders(
                    [
                        "Authorization" => "Bearer $token"
                    ]
                )->get($this->base_url . '/ekspor/lulusan-studi-lanjut?tahun=' . $i);



                $data = $response->json();
                if (!isset($data['data'])) {
                    Log::error("Invalid API response", ['year' => $i, 'status' => $response->status(), 'body' => $response->body()]);
                    continue;
                }
                $rows = [];
                foreach ($data['data'] as $item) {
                    $rows[] = [
                        'nama' => $item['nama'],
                        'nim' => $item['nim'],
                        'fakultas' => $item['fakultas'],
                        'prodi' => $item['prodi'],
                        'tahun_lulus' => $item['tahun_lulus'],
                        'status_pekerjaan' => '[4] Melanjutkan pendidikan',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }
                $chunks = array_chunk($rows, 200);
                foreach ($chunks as $chunk) {
                    DB::table('tracer_studies')->upsert(
                        $chunk,
                        ['name', 'nim'],
                        ['status_pekerjaan'],
                    );
                }
            }
        } catch (\Exception $err) {
            Log::error("Tracer data failed in /ekspor/lulusan-studi-lanjut", ['tahun' => $i, 'error' => $err->getMessage()]);
        }
    }
    public function synchronize()
    {
        try {
            $this->syncEksporData();
            sleep(5);
            $this->syncStudiLanjut();
            $this->sync->update(['status' => 'synchronized']);
            
        } catch (Exception $err) {
            $this->sync->update(['status' => 'error']);
            Log::error("Failed request on Tracer Study", ['error' => $err->getMessage()]);
        }
    }
}