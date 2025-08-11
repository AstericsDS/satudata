<?php

use App\Livewire\Login;
use App\Livewire\Navbar;
use App\Livewire\Akademik;
use App\Livewire\Dashboard;
use App\Http\Controllers\Counter;
use App\Livewire\JumlahMahasiswa;
use App\Livewire\Admin\Sinkronisasi;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;

// Public
Route::get('/', Akademik::class)->name('akademi');
Route::get('/login', Login::class)->name('login');
Route::get('/jumlah-mahasiswa', JumlahMahasiswa::class)->name('jumlah-mahasiswa');

// Admin
Route::prefix('admin')->group(function(){
    Route::get('/sinkronisasi', Sinkronisasi::class)->name('sinkronisasi-publik');
});

// API
Route::get('mahasiswa/import', [MahasiswaController::class, 'import']);