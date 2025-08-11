<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MahasiswaService;

class MahasiswaController extends Controller
{
    public function import(MahasiswaService $service)
    {
        $service->mhsCount();
    }
}
