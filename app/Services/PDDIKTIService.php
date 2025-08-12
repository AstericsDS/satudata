<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class PDDIKTIService
{
    public function getToken()
    {
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post(env('PDDIKTI_URL'), [
                    'act' => 'GetToken',
                    'username' => env('PDDIKTI_USERNAME'),
                    'password' => env('PDDIKTI_PASSWORD'),
                ]);

        $data = $response->json();
        Cache::store('database')->put('token', $data['data']['token']);
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
        ])->post(env('PDDIKTI_URL'), [
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
