<?php

namespace App\Services;
use Illuminate\Support\Facades\Http;
use App\Models\Data;

class MahasiswaAngkatanService
{
    public function synchronize()
    {
        $model = Data::first();
        $data = $model->mahasiswa_berdasarkan_angkatan;

        foreach ($data as $year => &$stats) {

            if ($year === 'updated_at') {
                continue;
            }

            // Get jumlah diterima
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
            ])->post(env('PDDIKTI_URL'), [
                        "act" => "GetCountMahasiswa",
                        "token" => env('PDDIKTI_TOKEN'),
                        "filter" => "nama_periode_masuk LIKE '{$year}%'",
                        "order" => "",
                        "limit" => "",
                        "offset" => 0
                    ]);

            // Get jumlah aktif
            $response2 = Http::withHeaders([
                'Content-Type' => 'application/json',
            ])->post(env('PDDIKTI_URL'), [
                        "act" => "GetCountMahasiswa",
                        "token" => env('PDDIKTI_TOKEN'),
                        "filter" => "nama_periode_masuk LIKE '{$year}%' AND nama_status_mahasiswa = 'AKTIF'",
                        "order" => "",
                        "limit" => "",
                        "offset" => 0
                    ]);

            // Store values
            $stats['jumlah_mahasiswa_diterima'] = $response->json()['data'] ?? 0;
            $stats['jumlah_mahasiswa'] = $response2->json()['data'] ?? 0;
        }

        // Save changes
        $model->mahasiswa_berdasarkan_angkatan = $data;
        $model->save();
    }

}