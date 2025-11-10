<?php

namespace App\Services;
use App\Models\Data;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class MahasiswaAngkatanService
{
    public function synchronize()
    {
        $token = Cache::get('token');
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
                        "token" => $token,
                        "filter" => "nama_periode_masuk LIKE '{$year}%' and nama_program_studi != 'Profesi Pendidikan Profesi Guru'",
                        "order" => "",
                        "limit" => "",
                        "offset" => 0
                    ]);

            // Get jumlah aktif
            $response2 = Http::withHeaders([
                'Content-Type' => 'application/json',
            ])->post(env('PDDIKTI_URL'), [
                        "act" => "GetCountMahasiswa",
                        "token" => $token,
                        "filter" => "nama_periode_masuk LIKE '{$year}%' AND nama_status_mahasiswa = 'AKTIF' and nama_program_studi != 'Profesi Pendidikan Profesi Guru'",
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