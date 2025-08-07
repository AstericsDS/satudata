<?php

use App\Http\Controllers\Counter;
use App\Services\DosenService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/lecturer-stats', [Counter::class, 'getCountLecturersByEducation']);
Route::get('/lecturer-jabatan', [DosenService::class, 'getCountLecturersByJabatan']);
Route::get('/lecturer-faculty', [DosenService::class, 'getCountLecturersByFaculty']);