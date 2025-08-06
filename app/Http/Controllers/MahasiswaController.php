<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MahasiswaSyncService;

class MahasiswaController extends Controller
{
    public function import(MahasiswaSyncService $service)
    {
        $service->import();

        return response()->json(['message' => 'Import completed (test mode).']);
    }
}
