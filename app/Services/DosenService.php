<?php

namespace App\Services;

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
}