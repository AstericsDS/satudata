<?php

use App\Livewire\Test;
use App\Livewire\Login;
use App\Livewire\Navbar;
use App\Livewire\Dashboard;
use App\Http\Controllers\Counter;
use App\Livewire\JumlahMahasiswa;
use App\Livewire\Admin\Sinkronisasi;
use App\Livewire\Public\LandingPage;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
use App\Http\Controllers\MahasiswaController;

// Public
Route::get('/', LandingPage::class)->name('landing-page');
Route::get('/dashboard', Dashboard::class)->name('dashboard');
Route::get('/login', Login::class)->name('login');

// Admin
Route::prefix('admin')->group(function(){
    Route::get('/sinkronisasi', Sinkronisasi::class)->name('sinkronisasi-publik');
});

// API
Route::get('/unj-angka', [DataController::class, 'angkatan']);

// Akademik dan Mahasiswa
Route::prefix('akademik-dan-mahasiswa')->group(function(){
    Route::get('/jumlah-mahasiswa', JumlahMahasiswa::class)->name('jumlah-mahasiswa');
});

// Kepegawaian dan Umum
Route::prefix('kepegawaian-dan-umum')->group(function() {

});

// Keuangan dan Perencanaan
Route::prefix('keuangan-dan-perencanaan')->group(function() {

});

// Bisnis dan Inovasi
Route::prefix('bisnis-dan-inovasi')->group(function() {

});

// Publikasi
Route::prefix('publikasi')->group(function() {

});