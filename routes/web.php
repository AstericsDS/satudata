<?php

use App\Livewire\Login;
use App\Livewire\Navbar;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', Login::class)->name('login');
Route::get('/dashboard', Navbar::class)->name('dashboard');