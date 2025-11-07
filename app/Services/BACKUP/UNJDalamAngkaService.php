<?php

namespace App\Services;

use App\Models\Data;
use App\Models\Mahasiswa;
use App\Services\PDDIKTIService;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class UNJDalamAngkaService
{
    protected $tokenService;

    public function __construct(PDDIKTIService $service)
    {
        $this->tokenService = $service;
    }

    public function dosenCount()
    {
        $token = Cache::get('token');
        $model = Data::first();
        $data = $model->unj_dalam_angka;

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post(env('PDDIKTI_URL'), [
                    "act" => "GetListDosen",
                    "token" => $token,
                    "filter" => "nama_status_aktif = 'Aktif' and nuptk is not null",
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
        $token = Cache::get('token');
        $model = Data::first();
        $data = $model->unj_dalam_angka;

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post(env('PDDIKTI_URL'), [
                    "act" => "GetListDosen",
                    "token" => $token,
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
        $token = Cache::get('token');
        $model = Data::first();
        $data = $model->unj_dalam_angka;
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post(env('PDDIKTI_URL'), [
                    "act" => "GetListMahasiswa",
                    "token" => $token,
                    "filter" => "nama_status_mahasiswa = 'AKTIF' AND status_sync = 'sudah sync' AND nama_program_studi != 'Profesi Pendidikan Profesi Guru'",
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
        $token = Cache::get('token');
        $model = Data::first();
        $data = $model->unj_dalam_angka;
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post(env('PDDIKTI_URL'), [
                    "act" => "GetListMahasiswa",
                    "token" => $token,
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