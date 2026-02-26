<?php

use App\Http\Controllers\SSOController;
use App\Jobs\SyncMahasiswa;
use App\Livewire\Admin\Sinkronisasi;
use App\Livewire\AkademikDanMahasiswa\BebanMengajar;
use App\Livewire\AkademikDanMahasiswa\DataAkreditasi;
use App\Livewire\AkademikDanMahasiswa\JumlahMahasiswa;
use App\Livewire\AkademikDanMahasiswa\JumlahWisudawan;
use App\Livewire\AkademikDanMahasiswa\RasioDosenMahasiswa;
use App\Livewire\AkademikDanMahasiswa\SebaranMahasiswa;
use App\Livewire\AkademikDanMahasiswa\SNBT;
use App\Livewire\AkademikDanMahasiswa\TracerStudy;
use App\Livewire\BisnisDanInovasi\Kemitraan;
use App\Livewire\Dashboard;
use App\Livewire\GrafikIndeksasiSinta;
use App\Livewire\KepegawaianDanUmum\AgendaPejabat;
use App\Livewire\KepegawaianDanUmum\JumlahTenagaKependidikan;
use App\Livewire\KepegawaianDanUmum\ProfilKepakaranDosen;
use App\Livewire\KepegawaianDanUmum\TemukanPegawai;
use App\Livewire\KeuanganDanPerencanaan\AnggaranDanDayaSerap;
use App\Livewire\Login;
use App\Livewire\Public\LandingPage;
use App\Models\Absensi;
use App\Models\Dosen;
use App\Models\Kerjasama;
use App\Models\Mahasiswa;
use App\Models\TracerStudy as Tracing;
use App\Services\AkademikDanMahasiswa\DosenService;
use App\Services\AkademikDanMahasiswa\TracerStudyService;
use App\Services\BisnisDanInovasi\KerjasamaService;
use App\Services\KepegawaianDanUmum\AbsensiService;
use Illuminate\Support\Facades\Route;

// Public
Route::get('/', LandingPage::class)->name('landing-page');
Route::get('/dashboard', Dashboard::class)->name('dashboard');
Route::get('/login', Login::class)->name('login');

// SSO
Route::get('/sso/login', [SSOController::class, 'redirectToProvider'])->name('sso.login');
Route::get('/sso/callback', [SSOController::class, 'handleProviderCallback'])->name('sso.callback');

// Admin
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/sinkronisasi', Sinkronisasi::class)->name('sinkronisasi-publik');
});

// Akademik dan Mahasiswa
Route::prefix('akademik-dan-mahasiswa')->group(function () {
    Route::get('/jumlah-mahasiswa', JumlahMahasiswa::class)->name('jumlah-mahasiswa');
    Route::get('/jumlah-wisudawan', JumlahWisudawan::class)->name('jumlah-wisudawan');
    Route::get('/tracer-study', TracerStudy::class)->name('tracer-study');
    Route::get('/sebaran-mahasiswa', SebaranMahasiswa::class)->name('sebaran-mahasiswa');
    Route::get('/sebaran-mahasiswa/snbt', SNBT::class)->name('snbt');
    Route::get('/beban-mengajar', BebanMengajar::class)->name('beban-mengajar');
    Route::get('/rasio-dosen-mahasiswa', RasioDosenMahasiswa::class)->name('rasio-dosen-mahasiswa');
    Route::get('/data-akreditasi', DataAkreditasi::class)->name('data-akreditasi');
});

// Kepegawaian dan Umum
Route::prefix('kepegawaian-dan-umum')->group(function () {
    Route::get('/agenda-pejabat', AgendaPejabat::class)->name('agenda-pejabat');
    Route::get('/profil-kepakaran-dosen', ProfilKepakaranDosen::class)->name('profil-kepakaran-dosen');
    Route::get('/jumlah-tenaga-kependidikan', JumlahTenagaKependidikan::class)->name('jumlah-tenaga-kependidikan');
    Route::get('/temukan-pegawai', TemukanPegawai::class)->name('temukan-pegawai');
});

// Keuangan dan Perencanaan
Route::prefix('keuangan-dan-perencanaan')->group(function () {
    Route::get('/anggaran-dan-daya-serap', AnggaranDanDayaSerap::class)->name('anggaran-dan-daya-serap');
});

// Bisnis dan Inovasi
Route::prefix('bisnis-dan-inovasi')->group(function () {
    Route::get('/kemitraan', Kemitraan::class)->name('kemitraan');
});

// Publikasi
Route::prefix('publikasi')->group(function () {
    Route::get('/grafik-indeksasi-sinta', GrafikIndeksasiSinta::class)->name('grafik-indeksasi-sinta');
});

// Private
Route::prefix('private')->group(function(){
    Route::get('/dashboard', Dashboard::class)->name('private-dashboard');
});

// DEBUG SPACE
Route::prefix('debug')->group(function () {
    Route::get('/sinkronisasi', Sinkronisasi::class)->name('sinkronisasi-publik');
    Route::get('/debug/api', function () {
        SyncMahasiswa::dispatchSync();
    });
    Route::get('/count-all', function () {
        return [
            'mahasiswa' => Mahasiswa::count(),
            'dosen' => Dosen::count(),
            'tracer' => Tracing::count(),
            'kerjasama' => Kerjasama::count()
        ];
    });
    Route::get('/count', function () {
        return [
            'Aktif dan Lulus' => Mahasiswa::where('periode_masuk', 'LIKE', '2021/2022%')
                ->where('jenjang', 'S1')
                ->whereIn('status', ['AKTIF', 'Lulus'])
                ->count(),
            'Distinct Status' => Mahasiswa::where('status', 'AKTIF')->count(),
            'Aktif' => Mahasiswa::where('periode_masuk', 'LIKE', '2021/2022%')->where('jenjang', '=', 'S1')->where('status', '=', 'AKTIF')->count(),
            '2018' => Mahasiswa::where('periode_masuk', 'LIKE', '2018/2019%')->count(),
            '2019' => Mahasiswa::where('periode_masuk', 'LIKE', '2019/2020%')->count(),
            '2020' => Mahasiswa::where('periode_masuk', 'LIKE', '2020/2021%')->count(),
            '2021' => Mahasiswa::where('periode_masuk', 'LIKE', '2021/2022%')->count(),
            '2022' => Mahasiswa::where('periode_masuk', 'LIKE', '2022/2023%')->count(),
            '2023' => Mahasiswa::where('periode_masuk', 'LIKE', '2023/2024%')->count(),
            '2024' => Mahasiswa::where('periode_masuk', 'LIKE', '2024/2025%')->count(),
            '2025' => Mahasiswa::where('periode_masuk', 'LIKE', '2025/2026%')->count(),
            'All' => Mahasiswa::all()->count(),
            'Wisuda 2024' => Mahasiswa::whereYear('tanggal_keluar', '2025')->count(),
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
            'wisuda2025' => Mahasiswa::where('status', '=', 'LULUS')->whereYear('tanggal_keluar', now()->year)->count(),
            'all_status' => Mahasiswa::select('status')->distinct()->get(),
            'all_fakultas' => Mahasiswa::select('fakultas')->distinct()->get(),
            'expelled' => Mahasiswa::where('status', '=', 'Dikeluarkan')->limit(5)->get(),
        ];
    });
    Route::get('/sipeg/sync', function (DosenService $service) {
        $service->synchronize();
    });
    Route::get('/sipeg/getJabatan', function (DosenService $service) {
        return $service->getJabatan();
    });
    Route::get('/sipeg/dosen', function (DosenService $service) {
        return [
            'All Jenjang' => Dosen::distinct()->pluck('jenjang')->toArray(),
            'All Prodi' => Dosen::distinct()->pluck('prodi'),
            'No jenjang' => Dosen::where('jenjang', '')->get(),
            'No Prodi' => Dosen::where('prodi', '')->get(),
            // 'Count null NIDN' => Dosen::where('nidn', '')->get(),
        ];
    });
    Route::get('/tracer-study', function (TracerStudyService $service) {
        // $service->synchronize();
        return [
            'total' => Tracing::count(),
            '2025' => Tracing::where('tahun_lulus', 2025)->count(),
            '2024' => Tracing::where('tahun_lulus', 2024)->count(),
            '2023' => Tracing::where('tahun_lulus', 2023)->count(),
            '2022' => Tracing::where('tahun_lulus', 2022)->count(),
            '2021' => Tracing::where('tahun_lulus', 2021)->count(),
            '2020' => Tracing::where('tahun_lulus', 2020)->count(),
            '2019' => Tracing::where('tahun_lulus', 2019)->count(),
            '2018' => Tracing::where('tahun_lulus', 2018)->count(),
            '2017' => Tracing::where('tahun_lulus', 2017)->count()
        ];
    });
    Route::get('/sync-tracer-study', function (TracerStudyService $service) {
        $service->syncEksporData();
    });
    Route::get('/sikerma', function (KerjasamaService $service) {
        $fakultas = Kerjasama::distinct()->pluck('unit');
        $result = $fakultas->map(function ($unit) {
            return [
                'unit' => $unit,
                'MoU' => Kerjasama::where('unit', $unit)->where('jenis_dokumen', 'Memorandum of Understanding (MoU)')->count(),
                'MoA' => Kerjasama::where('unit', $unit)->where('jenis_dokumen', 'Memorandum of Agreement (MoA)')->count(),
                'IA' => Kerjasama::where('unit', $unit)->where('jenis_dokumen', 'Implementation Arrangement (IA)')->count(),
            ];
        });
        $data = Kerjasama::where('unit', 'LIKE', '%Fakultas%')->get();
        return [
            // 'total' => Kerjasama::count(),
            // 'unit' => Kerjasama::distinct()->pluck('unit'),
            // 'jenis_dokumen' => Kerjasama::distinct()->pluck('jenis_dokumen'),
            // 'klasifikasi distinct' => Kerjasama::distinct()->pluck('klasifikasi'),
            // 'unit' => Kerjasama::distinct()->pluck('unit'),
            // 'per-fakultas' => $data->groupBy('klasifikasi'),
            // 'distinct-negara' => Kerjasama::distinct()->pluck('negara'),
            // 'distinct-kategori' => Kerjasama::distinct()->pluck('kategori'),
            'distinct-status' => Kerjasama::distinct()->pluck('status'),
            // 'distinct-negara' => Kerjasama::distinct()->pluck('tahun'),
        ];
    });
    Route::get('/sync-sikerma', function (KerjasamaService $service) {
        $service->synchronize();
    });
    Route::get('/letsgo', function(){
        $data_mahasiswa = Mahasiswa::distinct()->pluck('program_studi');
        $data_dosen = Dosen::distinct()->pluck('prodi');
        return [
            'onBoth' => $data_mahasiswa->intersect($data_dosen)->values()
        ];
    });
    Route::get('/absensi/sync', function() {
        $service = new AbsensiService();
        $service->synchronize();
    });
    Route::get('/absensi', function() {
        return Absensi::distinct('cabang')->pluck('cabang');
    });
});