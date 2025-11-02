<?php

use App\Livewire\Test;
use App\Livewire\Debug;
use App\Livewire\Login;
use App\Livewire\Navbar;
use App\Models\Mahasiswa;
use App\Jobs\SyncMahasiswa;
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
Route::prefix('admin')->group(function () {
    Route::get('/sinkronisasi', Sinkronisasi::class)->name('sinkronisasi-publik');
    Route::get('/debug', Debug::class)->name('debug');
    Route::get('/debug/api', function () {
        SyncMahasiswa::dispatchSync();
    });
    Route::get('/count', function () {
        $danan = Mahasiswa::where('nama', 'LIKE', '%danurwenda%')->first();
        return [
            '2018' => Mahasiswa::where('periode_masuk', 'LIKE', '2018/2019%')->count(),
            '2019' => Mahasiswa::where('periode_masuk', 'LIKE', '2019/2020%')->count(),
            '2020' => Mahasiswa::where('periode_masuk', 'LIKE', '2020/2021%')->count(),
            '2021' => Mahasiswa::where('periode_masuk', 'LIKE', '2021/2022%')->count(),
            '2022' => Mahasiswa::where('periode_masuk', 'LIKE', '2022/2023%')->count(),
            '2023' => Mahasiswa::where('periode_masuk', 'LIKE', '2023/2024%')->count(),
            '2024' => Mahasiswa::where('periode_masuk', 'LIKE', '2024/2025%')->count(),
            '2025' => Mahasiswa::where('periode_masuk', 'LIKE', '2025/2026%')->count(),
            'All' => Mahasiswa::all()->count(),
            // 'Tidak ada fakultas jumlah' => Mahasiswa::where('fakultas', '=', 'Tidak Ditemukan')->count(),
            // 'Tidak ada fakultas' => Mahasiswa::where('fakultas', '=', 'Tidak Ditemukan')->get(),
            // 'Tidak ada jenjang jumlah' => Mahasiswa::where('jenjang', '=', 'AKUJAWA')->count(),
            // 'Tidak ada jenjang' => Mahasiswa::where('jenjang', '=', 'AKUJAWA')->select('program_studi')->distinct()->get(),
            // 'Tidak ada fakultas' => Mahasiswa::where('fakultas', '=', 'Tidak Ditemukan')->select('program_studi')->distinct()->get(),
            // 'Tidak ada jenjang' => Mahasiswa::where('fakultas', '=', 'Tidak Ditemukan')->get(),
            // 'nama' => $item['nama_mahasiswa'] ?? '00',
            // 'program_studi' => $namaProdi ?? 'AB',
            // 'jenjang' => $item['jenjang'] ?? 'CD',
            // 'fakultas' => $item['fakultas'] ?? 'EF',
            // 'periode_masuk' => $item['nama_periode_masuk'] ?? 'GH',
            // 'Tidak ada nama' => Mahasiswa::where('nama', '=', '')->get(),
            // 'Tidak ada program studi' => Mahasiswa::where('nama', '=', '')->get(),
            // 'Tidak ada jenjang' => Mahasiswa::where('jenjang', '=', '')->get(),
            // 'Tidak ada fakultas' => Mahasiswa::where('fakultas', '=', '')->get(),
            // 'Tidak ada periode masuk' => Mahasiswa::where('fakultas', '=', '')->get(),
            // 'Tidak ada jenjang' => Mahasiswa::whereNull('jenjang')->count(),
            // 'Unknown 1' => Mahasiswa::where('program_studi', '=', value: 'D3 Perjalanan Wisata')->count(),
            // 'Unknown 2' => Mahasiswa::where('program_studi', '=', 'D3 Administrasi Perkantoran')->count(),
            // 'Unknown 3' => Mahasiswa::where('program_studi', '=', 'S1 Pendidikan Agama Islam')->count(),
            // 'Unknown 4' => Mahasiswa::where('program_studi', '=', 'S1 Pendidikan Bisnis')->count(),
            // 'Unknown 5' => Mahasiswa::where('program_studi', '=', 'S2 Pendidikan Jasmani')->count(),
            // 'Doubled NIPD' => $duplicates,
            'all_status' => Mahasiswa::select('status')->distinct()->get(),
            'expelled' => Mahasiswa::where('status', '=', 'Dikeluarkan')->limit(5)->get(),
            'tanggal_keluar' => $danan->tanggal_keluar->day
        ];
    });
});

// API
Route::get('/unj-angka', [DataController::class, 'angkatan']);

// Akademik dan Mahasiswa
Route::prefix('akademik-dan-mahasiswa')->group(function () {
    Route::get('/jumlah-mahasiswa', JumlahMahasiswa::class)->name('jumlah-mahasiswa');
});

// Kepegawaian dan Umum
Route::prefix('kepegawaian-dan-umum')->group(function () {

});

// Keuangan dan Perencanaan
Route::prefix('keuangan-dan-perencanaan')->group(function () {

});

// Bisnis dan Inovasi
Route::prefix('bisnis-dan-inovasi')->group(function () {

});

// Publikasi
Route::prefix('publikasi')->group(function () {

});