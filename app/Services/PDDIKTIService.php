<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class PDDIKTIService
{
    public function getToken()
    {
        // If token exists in cache, return it
        if (Cache::has('pddikti_token')) {
            return Cache::get('pddikti_token');
        }

        // Otherwise fetch a new token
        $response = Http::post(env('PDDIKTI_BASE_URL') . '/ws/live2.php', [
            'act' => 'GetToken',
            'username' => env('PDDIKTI_USER'),
            'password' => env('PDDIKTI_PASSWORD'),
        ]);

        $token = $response->json()['data']['token'] ?? null;

        if ($token) {
            // Store for 1 day (or actual expiry time if known)
            Cache::put('pddikti_token', $token, now()->addDay());
        }

        return $token;
    }
}
