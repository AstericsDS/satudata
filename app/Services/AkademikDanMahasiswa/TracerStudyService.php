<?php

namespace App\Services\AkademikDanMahasiswa;

use App\Models\Synchronize;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Throwable;

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
        for ($i = $this->year - 4; $i <= $this->year; $i++) {
            $response = Http::withHeaders(
                [
                    "Authorization" => "Bearer $token"
                ]
            )->timeout(120)->get($this->base_url . '/ekspor/data?tahun=' . $i);

            $data = $response->json();
            if($i === 2024){
                dd($data);
            }
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
    }
    public function syncStudiLanjut()
    {
        $token = $this->getToken();
        for ($i = $this->year - 4; $i <= $this->year; $i++) {

            $response = Http::withHeaders(
                [
                    "Authorization" => "Bearer $token"
                ]
            )->timeout(120)->get($this->base_url . '/ekspor/lulusan-studi-lanjut?tahun=' . $i);

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
                    ['nama', 'nim'],
                    ['status_pekerjaan'],
                );
            }

        }
    }
    public function synchronize()
    {
        set_time_limit(0);
        ini_set('memory_limit', '10240M');
        try {
            if($this->sync) {
                $this->sync->update(['status' => 'synchronizing']);
            }
            $this->syncEksporData();
            sleep(5);
            $this->syncStudiLanjut();
            if($this->sync) {
                $this->sync->update(['status' => 'synchronized']);
            }
        } catch (Throwable $err) {
            if($this->sync) {
                $this->sync->update(['status' => 'error']);
            }
            Log::error("Tracer data failed in /ekspor/lulusan-studi-lanjut", [$err->getMessage()]);
        }
    }
}