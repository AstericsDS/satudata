<?php

namespace App\Http\Controllers;

use App\Services\MahasiswaAngkatanService;
use Illuminate\Http\Request;
use App\Services\UNJDalamAngkaService;

class DataController extends Controller
{
    public function synchronize(UNJDalamAngkaService $service)
    {
        $service->dosenCount();
        $service->mahasiswaCount();
        $service->wisudaCount();
    }

    public function angkatan(MahasiswaAngkatanService $service)
    {
        $service->year1();
    }
}
