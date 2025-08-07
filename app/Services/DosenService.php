<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class DosenService {
    public function dosenCount()
    {
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
        return $response['jumlah'];
    }

    public function getCountLecturersByEducation() {
        $api_url = env('PDDIKTI_BASE_URL') . '/ws/live2.php';
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
        $api_url = env('PDDIKTI_API_URL');
        $token = env('PDDIKTI_API_TOKEN');

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
}