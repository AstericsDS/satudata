<?php

namespace App\Livewire;

use App\Models\Dosen;
use App\Models\Synchronize;
use Livewire\Component;
use App\Models\Mahasiswa;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Cache;

#[Title('Beranda')]
#[Layout('components.layouts.app')]
class Dashboard extends Component
{

    public $dashboardData = [];
    public $year, $month;
    public $percent_mahasiswa, $percent_wisuda, $percent_s3;
    public $syncMahasiswa;
    public $syncDosen;
    public function mount()
    {
        $this->month = now()->month;
        $this->syncMahasiswa = Synchronize::find(1);
        $this->syncDosen = Synchronize::find(2);
        $this->month = now()->month;
        $this->year = $this->month >= 10 ? now()->year : now()->year - 1;
        $this->dashboardData = Cache::remember('dashboard_data', 3600, function () {
            $data = [
                'wisuda' => Mahasiswa::where('status', '=', 'LULUS')->whereYear('tanggal_keluar', $this->year)->count(),
                'wisuda_tahun_lalu' => Mahasiswa::where('status', '=', 'LULUS')->whereYear('tanggal_keluar', $this->year - 1)->count(),
                'mahasiswa' => Mahasiswa::where('periode_masuk', 'LIKE', ($this->year . '/' . ($this->year + 1) . '%'))->count(),
                'mahasiswa_tahun_lalu' => Mahasiswa::where('periode_masuk', 'LIKE', (($this->year - 1) . '/' . $this->year . '%'))->count(),
                'dosen' => Dosen::count(),
            ];
            for ($i = $this->year - 7; $i <= $this->year; $i++) {
                $periode = $i . '/' . ($i + 1);
                $data['mahasiswa_tahun_angkatan'][$i] = Mahasiswa::where('periode_masuk', 'LIKE', ($periode . '%'))->where('status', '=', 'AKTIF')->count();
                $data['mahasiswa_diterima_tahun_angkatan'][$i] = Mahasiswa::where('periode_masuk', 'LIKE', ($periode . '%'))->count();
                $data['mahasiswa_s1'][$i] = Mahasiswa::where('periode_masuk', 'LIKE', ($periode . '%'))->where('jenjang', '=', 'S1')->whereIn('status', ['AKTIF', 'Lulus'])->count();
                $data['mahasiswa_s2'][$i] = Mahasiswa::where('periode_masuk', 'LIKE', ($periode . '%'))->where('jenjang', '=', 'S2')->whereIn('status', ['AKTIF', 'Lulus'])->count();
                $data['mahasiswa_s3'][$i] = Mahasiswa::where('periode_masuk', 'LIKE', ($periode . '%'))->where('jenjang', '=', 'S3')->whereIn('status', ['AKTIF', 'Lulus'])->count();
            }
            $data['dosen_pendidikan']['Magister'] = Dosen::where('gelar', '=', 'Magister')->count();
            $data['dosen_pendidikan']['Doktor'] = Dosen::where('gelar', '=', 'Dr.')->count();
            $data['dosen_jabatan']['Asisten Ahli'] = Dosen::whereJsonContains('jabatan', 'Asisten Ahli')->count();
            $data['dosen_jabatan']['Lektor'] = Dosen::whereJsonContains('jabatan', 'Lektor')->count();
            $data['dosen_jabatan']['Lektor Kepala'] = Dosen::whereJsonContains('jabatan', 'Lektor Kepala')->count();
            $data['dosen_jabatan']['Profesor'] = Dosen::whereJsonContains('jabatan', 'Profesor')->count();
            $data['dosen_jabatan']['Arsiparis Muda'] = Dosen::whereJsonContains('jabatan', 'Arsiparis Muda')->count();
            $data['dosen_jabatan']['Arsiparis Madya'] = Dosen::whereJsonContains('jabatan', 'Arsiparis Madya')->count();
            $data['dosen_fakultas']['FIP'] = Dosen::where('unit', '=', 'Fakultas Ilmu Pendidikan')->count();
            $data['dosen_fakultas']['FBS'] = Dosen::where('unit', '=', 'Fakultas Bahasa dan Seni')->count();
            $data['dosen_fakultas']['FMIPA'] = Dosen::where('unit', '=', 'Fakultas Matematika dan Ilmu Pengetahuan Alam')->count();
            $data['dosen_fakultas']['FISH'] = Dosen::where('unit', '=', 'Fakultas Ilmu Sosial dan Hukum')->count();
            $data['dosen_fakultas']['FT'] = Dosen::where('unit', '=', 'Fakultas Teknik')->count();
            $data['dosen_fakultas']['FIKK'] = Dosen::where('unit', '=', 'Fakultas Ilmu Keolahragaan dan Kesehatan')->count();
            $data['dosen_fakultas']['FEB'] = Dosen::where('unit', '=', 'Fakultas Ekonomi dan Bisnis')->count();
            $data['dosen_fakultas']['FPsi'] = Dosen::where('unit', '=', 'Fakultas Psikologi')->count();
            $data['dosen_fakultas']['SPasca'] = Dosen::where('unit', '=', 'Sekolah Pascasarjana')->count();
            $data['dosen_status']['Dosen'] = Dosen::where('status', '=', 'Dosen')->count();
            $data['dosen_status']['Dosen Tetap'] = Dosen::where('status', '=', 'Dosen Tetap')->count();
            $data['dosen_status']['Dosen Tidak Tetap'] = Dosen::where('status', '=', 'Dosen Tidak Tetap')->count();
            $data['dosen_status']['PPPK'] = Dosen::where('status', '=', 'PPPK_Dosen')->count();
            $data['mahasiswa_fakultas']['FIP'] = Mahasiswa::where('fakultas', '=', 'Fakultas Ilmu Pendidikan')->whereIn('status', ['AKTIF', 'Lulus'])->count();
            $data['mahasiswa_fakultas']['FBS'] = Mahasiswa::where('fakultas', '=', 'Fakultas Bahasa dan Seni')->whereIn('status', ['AKTIF', 'Lulus'])->count();
            $data['mahasiswa_fakultas']['FMIPA'] = Mahasiswa::where('fakultas', '=', 'Fakultas Matematika dan Ilmu Pengetahuan Alam')->whereIn('status', ['AKTIF', 'Lulus'])->count();
            $data['mahasiswa_fakultas']['FISH'] = Mahasiswa::where('fakultas', '=', 'Fakultas Ilmu Sosial dan Hukum')->whereIn('status', ['AKTIF', 'Lulus'])->count();
            $data['mahasiswa_fakultas']['FT'] = Mahasiswa::where('fakultas', '=', 'Fakultas Teknik')->whereIn('status', ['AKTIF', 'Lulus'])->count();
            $data['mahasiswa_fakultas']['FIKK'] = Mahasiswa::where('fakultas', '=', 'Fakultas Ilmu Keolahragaan dan Kesehatan')->whereIn('status', ['AKTIF', 'Lulus'])->count();
            $data['mahasiswa_fakultas']['FEB'] = Mahasiswa::where('fakultas', '=', 'Fakultas Ekonomi dan Bisnis')->whereIn('status', ['AKTIF', 'Lulus'])->count();
            $data['mahasiswa_fakultas']['FPsi'] = Mahasiswa::where('fakultas', '=', 'Fakultas Psikologi')->whereIn('status', ['AKTIF', 'Lulus'])->count();
            $data['mahasiswa_fakultas']['SPasca'] = Mahasiswa::where('fakultas', '=', 'Sekolah Pascasarjana')->whereIn('status', ['AKTIF', 'Lulus'])->count();
            return $data;
        });
        $this->percent_wisuda = ($this->dashboardData['wisuda_tahun_lalu'] ?? 0) != 0
            ? number_format((($this->dashboardData['wisuda'] ?? 0) - $this->dashboardData['wisuda_tahun_lalu']) / $this->dashboardData['wisuda_tahun_lalu'] * 100, 2)
            : '-';
        $this->percent_mahasiswa = ($this->dashboardData['mahasiswa_tahun_lalu'] ?? 0) != 0
            ? number_format((($this->dashboardData['mahasiswa'] ?? 0) - $this->dashboardData['mahasiswa_tahun_lalu']) / $this->dashboardData['mahasiswa_tahun_lalu'] * 100, 2)
            : '-';
        $this->percent_s3 = ($this->dashboardData['dosen'] ?? 0) != 0
            ? number_format(($this->dashboardData['dosen_pendidikan']['Doktor'] ?? 0) / $this->dashboardData['dosen'] * 100, 2)
            : '-';
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}