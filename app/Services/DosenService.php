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

        $response_plp = Http::withHeaders([
            'Content-Type' => 'application/json'
        ])->post(env('PDDIKTI_URL'), [
            "act" => "GetRiwayatFungsionalDosen",
            "token" => $token,
            "filter" => "nama_jabatan_fungsional = 'PLP Terampil Mahir' and nuptk is not null",
            "order" => "",
            "limit" => "",
            "offset" => 0
        ]);

        $response_asisten = Http::withHeaders([
            'Content-Type' => 'application/json'
        ])->post(env('PDDIKTI_URL'), [
            "act" => "GetRiwayatFungsionalDosen",
            "token" => $token,
            "filter" => "nama_jabatan_fungsional = 'Asisten Ahli' and nuptk is not null",
            "order" => "",
            "limit" => "",
            "offset" => 0
        ]);

        $response_lektor = Http::withHeaders([
            'Content-Type' => 'application/json'
        ])->post(env('PDDIKTI_URL'), [
            "act" => "GetRiwayatFungsionalDosen",
            "token" => $token,
            "filter" => "nama_jabatan_fungsional = 'Lektor' and nuptk is not null",
            "order" => "",
            "limit" => "",
            "offset" => 0
        ]);

        $response_lektor_kepala = Http::withHeaders([
            'Content-Type' => 'application/json'
        ])->post(env('PDDIKTI_URL'), [
            "act" => "GetRiwayatFungsionalDosen",
            "token" => $token,
            "filter" => "nama_jabatan_fungsional = 'Lektor Kepala' and nuptk is not null",
            "order" => "",
            "limit" => "",
            "offset" => 0
        ]);

        $response_profesor = Http::withHeaders([
            'Content-Type' => 'application/json'
        ])->post(env('PDDIKTI_URL'), [
            "act" => "GetRiwayatFungsionalDosen",
            "token" => $token,
            "filter" => "nama_jabatan_fungsional = 'Profesor' and nuptk is not null",
            "order" => "",
            "limit" => "",
            "offset" => 0
        ]);

        $dosen_plp = new Collection($response_plp->json()['data']);
        $dosen_asisten = new Collection($response_asisten->json()['data']);
        $dosen_lektor = new Collection($response_lektor->json()['data']);
        $dosen_lektor_kepala = new Collection($response_lektor_kepala->json()['data']);
        $dosen_profesor = new Collection($response_profesor->json()['data']);

        $data['jumlah_dosen_plp'] = $dosen_plp->count() ?? 0;
        $data['jumlah_dosen_asisten'] = $dosen_asisten->count() ?? 0;
        $data['jumlah_dosen_lektor'] = $dosen_lektor->count() ?? 0;
        $data['jumlah_dosen_lektor_kepala'] = $dosen_lektor_kepala->count() ?? 0;
        $data['jumlah_dosen_profesor'] = $dosen_profesor->count() ?? 0;

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

    public function getDosenSipeg() {
        $api_url = env('SIPEG_BASE_URL') . '/api/pegawai';

        $response = Http::withToken(env('SIPEG_TOKEN'))->get($api_url);

        // $data = json_decode($response->body(), true);
        $data2 = $response->json()['pegawais'];
        
        $dosens = collect($data2);
        $dosen = $dosens->where('cabang', 'Dosen Tetap')->count();
        // return response()->json([
        //     'dosen' => $dosen
        // ]);
        dd($dosen);
    }
    
    public function getCountLecturersByJabatan() {
        $api_url = env('PDDIKTI_URL');
        $token = env('PDDIKTI_TOKEN');

        $response = Http::post($api_url, [
            'act' => 'GetRiwayatFungsionalDosen',
            'token' => $token,
            'filter' => "",
            'limit' => "",
            'offset' => '0'
        ]);

        if(!$response->successful()) {
            return response()->json(['error' => 'Failed to fetch data'], 500);
        }

        $lecturers = new Collection($response->json()['data']);
        $plp = $lecturers->where('nama_jabatan_fungsional', 'PLP Terampil Mahir')->whereNotNull('nuptk')->count();
        $asisten_ahli = $lecturers->where('nama_jabatan_fungsional', 'Asisten Ahli')->whereNotNull('nuptk')->count();
        $lektor = $lecturers->where('nama_jabatan_fungsional', 'Lektor')->whereNotNull('nuptk')->count();
        $lektor_kepala = $lecturers->where('nama_jabatan_fungsional', 'Lektor Kepala')->whereNotNull('nuptk')->count();
        $profesor = $lecturers->where('nama_jabatan_fungsional', 'Profesor')->whereNotNull('nuptk')->count();

        return response()->json([
            'PLP Terampil Mahir' => $plp,
            'Asisten Ahli' => $asisten_ahli,
            'Lektor' => $lektor,
            'Lektor Kepala' => $lektor_kepala,
            'profesor' => $profesor
        ]);
    }

    // sejujurna ini masih nguwawor
    public function getCountLecturersByFaculty() {
        $token = env('SIAKAD_BASE_URL');
        // $api_url = env('SIAKAD_BASE_URL') . '/dataLengkapDosen/All/' . $token;

        $facultyCounts = Cache::remember('lecturer_faculty_counts', 60, function () {
        
            $faculties = [
                '99' => 'Sekolah Pascasarjana',
                '11' => 'Fakultas Ilmu Pendidikan',
                '12' => 'Fakultas Bahasa dan Seni',
                '13' => 'Fakultas Matematika dan Ilmu Pengetahuan Alam',
                '14' => 'Fakultas Ilmu Sosial dan Hukum',
                '15' => 'Fakultas Teknik',
                '16' => 'Fakultas Ilmu Keolahragaan dan Kesehatan',
                '17' => 'Fakultas Ekonomi dan Bisnis',
                '18' => 'Fakultas Psikologi',
                '20' => 'Program Profesi Guru'
            ];

            $base_url = env('SIAKAD_BASE_URL');
            $counts = [];

            foreach ($faculties as $faculty_code => $faculty_name) {
                $dosenApiUrl = "{$base_url}/api/as400/dosenFakultas/{$faculty_code}";
                $dosenResponse = Http::get($dosenApiUrl);

                if ($dosenResponse->successful()) {
                    $lecturerCount = count($dosenResponse->json());
                    $counts[$faculty_name] = $lecturerCount;
                } else {
                    $counts[$faculty_name] = 0;
                }
            }
            return $counts;
        });
        return response()->json($facultyCounts);
    }
}