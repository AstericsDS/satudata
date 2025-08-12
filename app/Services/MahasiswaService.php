<?php

namespace App\Services;

use App\Models\Data;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Http;

class MahasiswaService
{
    public function import()
    {
        $limit = 1000;
        $offset = 0;

        do {
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
            ])->post(env('PDDIKTI_URL'), [
                        "act" => "GetListMahasiswa",
                        "token" => env('PDDIKTI_TOKEN'),
                        "filter" => "nama_status_mahasiswa = 'AKTIF' AND status_sync = 'sudah sync'",
                        "order" => "",
                        "limit" => $limit,
                        "offset" => $offset
                    ]);

            $chunk = $response->json();
            // Optional: safely access nested keys if needed
            $mahasiswaList = $chunk['data'] ?? $chunk; // adjust based on API structure
            $this->insertInChunks($mahasiswaList);
            $offset += $limit;
        } while (count($mahasiswaList) > 0);
    }

    function insertInChunks(array $list)
    {
        foreach (array_chunk($list, 100) as $chunk) {
            foreach ($chunk as $item) {
                Mahasiswa::firstOrCreate(
                    [
                        'nama_mahasiswa' => $item['nama_mahasiswa'],
                    ],
                    [
                        'tanggal_lahir' => $item['tanggal_lahir'],
                        'nama_program_studi' => $item['nama_program_studi'],
                        'nama_status_mahasiswa' => $item['nama_status_mahasiswa'],
                        'nama_periode_masuk' => $item['nama_periode_masuk'],
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]
                );

            }


        }
    }

    public function mhsCount()
    {
        $model = Data::first();
        $data = $model->unj_dalam_angka;
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post(env('PDDIKTI_URL'), [
                    "act" => "GetListMahasiswa",
                    "token" => env('PDDIKTI_TOKEN'),
                    "filter" => "nama_status_mahasiswa = 'AKTIF' AND status_sync = 'sudah sync'",
                    "order" => "",
                    "limit" => '',
                    "offset" => 0,
                ]);

        $data['jumlah_mahasiswa'] = $response->json()['jumlah'];
        $model->unj_dalam_angka = $data;
        $model->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Jumlah mahasiswa updated successfully',
            'jumlah_mahasiswa' => $model['jumlah_mahasiswa']
        ]);
    }

    function lulusCount()
    {
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post(env('PDDIKTI_URL'), [
                    "act" => "GetListMahasiswaLulusDO",
                    "token" => env('PDDIKTI_TOKEN'),
                    "filter" => "nama_jenis_keluar = 'Lulus' AND tanggal_keluar LIKE '%2025'",
                    "order" => "",
                    "limit" => "",
                    "offset" => "0"
                ]);
        return count($response['data']);
    }
}
