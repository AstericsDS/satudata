<?php

namespace App\Services;

use App\Models\Data;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;


class DosenService {

    public function synchronizePendidikanDosen() {
        $token = Cache::get('token');
        $model = Data::first();
        $data = $model->dosen_berdasarkan_pendidikan;

        $response_s2 = Http::withHeaders([
            'Content-Type' => 'application/json'
        ])->post(env('PDDIKTI_URL'), [
            "act" => "GetRiwayatPendidikanDosen",
            "token" => $token,
            "filter" => "nama_jenjang_pendidikan = 'S2' and nuptk is not null",
            "order" => "",
            "limit" => "",
            "offset" => 0
        ]);

        $response_s3 = Http::withHeaders([
            'Content-Type' => 'application/json'
        ])->post(env('PDDIKTI_URL'), [
            "act" => "GetRiwayatPendidikanDosen",
            "token" => $token,
            "filter" => "nama_jenjang_pendidikan = 'S3' and nuptk is not null",
            "order" => "",
            "limit" => "",
            "offset" => 0
        ]);

        $dosen_s2 = new Collection($response_s2->json()['data']);
        $dosen_s3 = new Collection($response_s3->json()['data']);

        $data['jumlah_dosen_s2'] = $dosen_s2->count() ?? 0;
        $data['jumlah_dosen_s3'] = $dosen_s3->count() ?? 0;

        $model->dosen_berdasarkan_pendidikan = $data;
        $model->save();
    }

    public function synchronizeJabatanDosen() {
        $token = Cache::get('token');
        $model = Data::first();
        $data = $model->dosen_berdasarkan_jabatan_fungsional;

        $jabatan_dosen = [
            'jumlah_dosen_plp' => 'PLP Terampil Mahir',
            'jumlah_dosen_asisten' => 'Asisten Ahli',
            'jumlah_dosen_lektor' => 'Lektor',
            'jumlah_dosen_lektor_kepala' => 'Lektor Kepala',
            'jumlah_dosen_profesor' => 'Profesor',
        ];

        $response = Http::withHeaders([
            'Content-Type' => 'application/json'
        ])->post(env('PDDIKTI_URL'), [
            "act" => "GetRiwayatFungsionalDosen",
            "token" => $token,
            "filter" => "",
            "order" => "",
            "limit" => "",
            "offset" => 0
        ]);
        $dosen = collect($response->json()['data']);

        foreach($jabatan_dosen as $key => $jabatan) {
            $data[$key] = $dosen->where('nama_jabatan_fungsional', $jabatan)->count();
        }

        $model->dosen_berdasarkan_jabatan_fungsional = $data;
        $model->save();
    }

    public function synchronizeKepegawaianDosen() {
        $api_url = env('SIPEG_BASE_URL') . '/api/pegawai';
        $token = env('SIPEG_TOKEN');
        $model = Data::first();
        $data = $model->dosen_berdasarkan_status_kepegawaian;

        $response = Http::withToken($token)->get($api_url);
        $dosen = collect($response->json()['pegawais']);

        $data['jumlah_dosen_pns'] = $dosen->where('cabang', 'Dosen')->count() ?? 0;
        $data['jumlah_dosen_pppk'] = $dosen->where('cabang', 'PPPK_Dosen')->count() ?? 0;
        $data['jumlah_dosen_tetap'] = $dosen->where('cabang', 'Dosen Tetap')->count() ?? 0;
        $data['jumlah_dosen_tidak_tetap'] = $dosen->where('cabang', 'Dosen Tidak Tetap')->count() ?? 0;

        $model->dosen_berdasarkan_status_kepegawaian = $data;
        $model->save();
    }

    public function synchronizeFakultasDosen() {
        $token = env('SIAKAD_TOKEN');
        $api_url = env('SIAKAD_BASE_URL') . '/dataLengkapDosen/All/' . $token;
        $model = Data::first();
        $data = $model->dosen_berdasarkan_fakultas;

        $list_fakultas = [
            'jumlah_dosen_pascasarjana' => 'Sekolah Pascasarjana',
            'jumlah_dosen_fip' => 'Fakultas Ilmu Pendidikan',
            'jumlah_dosen_fbs' => 'Fakultas Bahasa dan Seni',
            'jumlah_dosen_fmipa' => 'Fakultas Matematika dan Ilmu Pengetahuan Alam',
            'jumlah_dosen_fish' => 'Fakultas Ilmu Sosial dan Hukum',
            'jumlah_dosen_ft' => 'Fakultas Teknik',
            'jumlah_dosen_fikk' => 'Fakultas Ilmu Keolahragaan dan Kesehatan',
            'jumlah_dosen_feb' => 'Fakultas Ekonomi dan Bisnis',
            'jumlah_dosen_fpsi' => 'Fakultas Psikologi',
            'jumlah_dosen_ppg' => 'Program Profesi Guru'
        ];

        $response = Http::withToken($token)->timeout(35000)->get($api_url);
        $dosen = collect($response->json()['isi']);

        foreach($list_fakultas as $key => $fakultas) {
            $data[$key] = $dosen->where('namafakultas', $fakultas)->count();
        }

        $model->dosen_berdasarkan_fakultas = $data;
        $model->save();
    }
}