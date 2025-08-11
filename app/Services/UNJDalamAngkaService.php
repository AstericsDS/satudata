<?php

namespace App\Services;

use App\Models\Data;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Http;

class UNJDalamAngkaService
{
    public function dosenCount()
    {
        $model = Data::first();
        $data = $model->unj_dalam_angka;

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post(env('PDDIKTI_BASE_URL') . '/ws/live2.php', [
                    "act" => "GetListDosen",
                    "token" => env('PDDIKTI_TOKEN'),
                    "filter" => "nama_status_aktif = 'Aktif'",
                    "order" => "",
                    "limit" => "",
                    "offset" => "0"
                ]);
        $data['jumlah_dosen'] = $response->json()['jumlah'];
        $model->unj_dalam_angka = $data;
        $model->save();
    }

    public function dosenTahunSebelumCount()
    {
        $model = Data::first();
        $data = $model->unj_dalam_angka;

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post(env('PDDIKTI_BASE_URL') . '/ws/live2.php', [
                    "act" => "GetListDosen",
                    "token" => env('PDDIKTI_TOKEN'),
                    "filter" => "nama_status_aktif = 'Aktif'",
                    "order" => "",
                    "limit" => "",
                    "offset" => "0"
                ]);
        $data['jumlah_dosen_tahun_sebelum'] = $response->json()['jumlah'];
        $model->unj_dalam_angka = $data;
        $model->save();
    }

    public function mahasiswaCount()
    {
        $model = Data::first();
        $data = $model->unj_dalam_angka;
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post(env('PDDIKTI_BASE_URL') . '/ws/live2.php', [
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
    }

    public function wisudaCount()
    {
        $model = Data::first();
        $data = $model->unj_dalam_angka;
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post(env('PDDIKTI_BASE_URL') . '/ws/live2.php', [
                    "act" => "GetListMahasiswa",
                    "token" => env('PDDIKTI_TOKEN'),
                    "filter" => "tanggal_keluar LIKE '%2025' AND status_sync = 'sudah sync'",
                    "order" => "",
                    "limit" => "",
                    "offset" => 0
                ]);

        $data['wisuda_2025'] = $response->json()['jumlah'];
        $model->unj_dalam_angka = $data;
        $model->save();
    }
}
