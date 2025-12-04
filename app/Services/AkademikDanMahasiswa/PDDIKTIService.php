<?php

namespace App\Services\AkademikDanMahasiswa;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class PDDIKTIService
{
    public function getToken()
    {
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post(config('api.pddikti_url'), [
                    'act' => 'GetToken',
                    'username' => config('api.pddikti_username'),
                    'password' => config('api.pddikti_password'),
                ]);

        $data = $response->json();
        Cache::put('token', $data['data']['token']);
        return;
    }

    public function refreshToken()
    {
        Cache::forget('token');
        return $this->getToken();
    }

    public function checkToken()
    {
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post(config('api.pddikti_url'), [
                    "act" => "GetListDosen",
                    "token" => Cache::get('token'),
                    "filter" => "nama_status_aktif = 'Aktif'",
                    "order" => "",
                    "limit" => "1",
                    "offset" => "0"
                ]);

        if ($response['error_code'] == '100' && $response['error_desc'] == 'Invalid Token. Token tidak ada atau token sudah expired.') {
            $this->refreshToken();
        }
    }
}
