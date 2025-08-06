<?php

use App\Http\Controllers\MahasiswaController;
use App\Livewire\Login;
use App\Livewire\Navbar;
use App\Livewire\Akademik;
use App\Livewire\Dashboard;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', Login::class)->name('login');
Route::get('/', Akademik::class)->name('akademi');

Route::get('mahasiswa/import', [MahasiswaController::class, 'import']);