<?php

namespace App\Services;
use Illuminate\Support\Facades\Http;
use App\Models\Data;

class MahasiswaAngkatanService
{
    public function year1()
    {
        $model = Data::first();
        $data = $model->mahasiswa_berdasarkan_angkatan;

        // $response = Http::withHeaders([
        //     'Content-Type' => 'application/json',
        // ])->post(env('PDDIKTI_BASE_URL') . '/ws/live2.php', [
        //             "act" => "GetCountMahasiswa",
        //             "token" => env('PDDIKTI_TOKEN'),
        //             "filter" => "nama_periode_masuk LIKE '2018%'",
        //             "order" => "",
        //             "limit" => "",
        //             "offset" => 0
        //         ]);

        // $response2 = Http::withHeaders([
        //     'Content-Type' => 'application/json',
        // ])->post(env('PDDIKTI_BASE_URL') . '/ws/live2.php', [
        //             "act" => "GetCountMahasiswa",
        //             "token" => env('PDDIKTI_TOKEN'),
        //             "filter" => "nama_periode_masuk LIKE '2018%' AND nama_status_mahasiswa = 'AKTIF'",
        //             "order" => "",
        //             "limit" => "",
        //             "offset" => 0
        //         ]);

        // $data[0]['jumlah_mahasiswa_diterima'] = $response->json()['data'];
        // $data[0]['jumlahh_mahasiswa'] = $response2->json()['data'];
        // $model->mahasiswa_berdasarkan_angkatan = $data;
        // $model->save();

        foreach ($data as $year => &$stats) {
            // Get jumlah diterima
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
            ])->post(env('PDDIKTI_BASE_URL') . '/ws/live2.php', [
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
            ])->post(env('PDDIKTI_BASE_URL') . '/ws/live2.php', [
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
        return response()->json([
            'success' => true,
            'message' => 'Berhasil'
        ]);
        
    }
    public function year2()
    {

    }
    public function year3()
    {

    }
    public function year4()
    {

    }
    public function year5()
    {

    }
    public function year6()
    {

    }
    public function year7()
    {

    }
    public function year8()
    {

    }
    public function year9()
    {

    }
    public function year10()
    {

    }
}