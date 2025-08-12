<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class DosenService {
    public function dosenCount()
    {
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post(env('PDDIKTI_URL'), [
            "act" => "GetListDosen",
            "token" => env('PDDIKTI_TOKEN'),
            "filter" => "nama_status_aktif = 'Aktif'",
            "order" => "",
            "limit" => "",
            "offset" => "0"
        ]);
        return $response['jumlah'];
    }

    public function getCountLecturersByEducation() {
        $api_url = env('PDDIKTI_URL');
        $token = env('PDDIKTI_TOKEN');

        $response = Http::post($api_url, [
            'act' => 'GetRiwayatPendidikanDosen',
            'token' => $token,
            'filter' => "",
            'limit' => "",
            'offset' => '0'
        ]);

        if(!$response->successful()) {
            return response()->json(['error' => 'Failed to fetch data'], 500);
        }

        $lecturers = new Collection($response->json()['data']);
        $s2 = $lecturers->where('nama_jenjang_pendidikan', 'S2')->count();
        $s3 = $lecturers->where('nama_jenjang_pendidikan', 'S3')->count();

        return response()->json([
            's2_lecturers' => $s2,
            's3_lecturers' => $s3,
        ]);
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
        $plp = $lecturers->where('nama_jabatan_fungsional', 'PLP Terampil Mahir')->count();
        $asisten_ahli = $lecturers->where('nama_jabatan_fungsional', 'Asisten Ahli')->count();
        $lektor = $lecturers->where('nama_jabatan_fungsional', 'Lektor')->count();
        $lektor_kepala = $lecturers->where('nama_jabatan_fungsional', 'Lektor Kepala')->count();
        $profesor = $lecturers->where('nama_jabatan_fungsional', 'Profesor')->count();

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