<?php

namespace App\Livewire\AkademikDanMahasiswa;

use Livewire\Component;
use App\Models\Synchronize;
use Livewire\Attributes\Title;
use App\Models\TracerStudy as Model;
use Illuminate\Support\Facades\Cache;

#[Title('Tracer Study')]
class TracerStudy extends Component
{
    public $data;
    public $year, $month;
    public $growth, $first, $second;
    public $update;
    public function mount()
    {
        $this->month = now()->month;
        $this->year = $this->month >= 10 ? now()->year : now()->year - 1;
        $this->update = Synchronize::where('name', 'Tracer Study')->first() ?? '';
        $this->data = Cache::remember('tracer_study', 3600, function () {
            $data = [
                'statistik' => [
                    'current' => Model::where('tahun_lulus', $this->year)->count(),
                    'before' => Model::where('tahun_lulus', $this->year - 1)->count(),
                ],
                'fakultas' => [
                    'FIS' => Model::where('fakultas', 'Fakultas Ilmu Sosial (FIS)')->where('tahun_lulus', $this->year)->count(),
                    'FE' => Model::where('fakultas', 'Fakultas Ekonomi (FE)')->where('tahun_lulus', $this->year)->count(),
                    'FT' => Model::where('fakultas', 'Fakultas Teknik (FT)')->where('tahun_lulus', $this->year)->count(),
                    'FBS' => Model::where('fakultas', 'Fakultas Bahasa dan Seni (FBS)')->where('tahun_lulus', $this->year)->count(),
                    'FMIPA' => Model::where('fakultas', 'Fakultas Matematika dan Ilmu Pengetahuan Alam (FMIPA)')->where('tahun_lulus', $this->year)->count(),
                    'FIP' => Model::where('fakultas', 'Fakultas Ilmu Pendidikan (FIP)')->where('tahun_lulus', $this->year)->count(),
                    'FPsi' => Model::where('fakultas', 'Fakultas Pendidikan Psikologi (FPPsi)')->where('tahun_lulus', $this->year)->count(),
                    'FIKK' => Model::where('fakultas', 'Fakultas Ilmu Keolahragaan (FIK)')->where('tahun_lulus', $this->year)->count(),
                ],
                'status_pekerjaan' => [
                    'Bekerja' => Model::where('status_pekerjaan', '[1] Bekerja')->where('tahun_lulus', $this->year)->count(),
                    'Belum Memungkinkan Bekerja' => Model::where('status_pekerjaan', '[2] Belum memungkinkan bekerja')->where('tahun_lulus', $this->year)->count(),
                    'Wiraswasta' => Model::where('status_pekerjaan', '[3] Wiraswasta')->where('tahun_lulus', $this->year)->count(),
                    'Melanjutkan Pendidikan' => Model::where('status_pekerjaan', '[4] Melanjutkan pendidikan')->where('tahun_lulus', $this->year)->count(),
                    'Mencari Pekerjaan' => Model::where('status_pekerjaan', '[5] Tidak kerja tetapi sedang mencari kerja')->where('tahun_lulus', $this->year)->count(),
                ]
            ];
            return $data;
        });
        if($this->data['statistik']['before'] !== 0) {
            $this->growth = number_format(($this->data['statistik']['current'] - $this->data['statistik']['before']) / $this->data['statistik']['before'] * 100, 2);
        } else {
            $this->growth = 0;
        }
    }
    public function render()
    {
        return view('livewire.akademik-dan-mahasiswa.tracer-study');
    }
}
