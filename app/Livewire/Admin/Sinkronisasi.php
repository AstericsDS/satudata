<?php

namespace App\Livewire\Admin;

use App\Models\Data;
use App\Models\Dosen;
use App\Services\DosenPendidikanService;
use App\Services\DosenService;
use App\Services\PDDIKTIService;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Services\UNJDalamAngkaService;
use App\Services\MahasiswaAngkatanService;

#[Title('Dashboard Admin')]
#[Layout('components.layouts.admin')]
class Sinkronisasi extends Component
{
    protected PDDIKTIService $pddikti;
    public Data $data;
    public $jumlah_mahasiswa_diterima = [];
    public $jumlah_mahasiswa = [];
    
    public function __construct()
    {
        $this->pddikti = app(PDDIKTIService::class);
    }
    
    public function unjDalamAngka(UNJDalamAngkaService $service)
    {
        $this->pddikti->checkToken();
        $service->dosenCount();
        $service->mahasiswaCount();
        $service->wisudaCount();

        Data::where('id', '1')->update([
            'unj_dalam_angka->updated_at' => now('Asia/Jakarta')->locale('id')->translatedFormat('l, d F (H:i:s)')
        ]);
    }

    public function mahasiswaAngkatan(MahasiswaAngkatanService $service)
    {
        $this->pddikti->checkToken();
        $service->synchronize();
        Data::where('id', 1)->update([
            'mahasiswa_berdasarkan_angkatan->updated_at' => now('Asia/Jakarta')->locale('id')->translatedFormat('l, d F (H:i:s)')
        ]);
    }

    public function dosenPendidikan(DosenService $service) {
        $this->pddikti->checkToken();
        $service->synchronizePendidikanDosen();
        Data::where('id', 1)->update([
            'dosen_berdasarkan_pendidikan->updated_at' => now('Asia/Jakarta')->locale('id')->translatedFormat('l, d F (H:i:s)')
        ]);
    }

    public function dosenJabatan(DosenService $service) {
        $this->pddikti->checkToken();
        $service->synchronizeJabatanDosen();
        Data::where('id', 1)->update([
            'dosen_berdasarkan_jabatan_fungsional->updated_at' => now('Asia/Jakarta')->locale('id')->translatedFormat('l, d F (H:i:s)')
        ]);
    }

    public function dosenKepegawaian(DosenService $service) {
        $service->synchronizeKepegawaianDosen();
        Data::where('id', 1)->update([
            'dosen_berdasarkan_status_kepegawaian->updated_at' => now('Asia/Jakarta')->locale('id')->translatedFormat('l, d F (H:i:s)')
        ]);
    }

    public function mount()
    {
        $this->data = Data::first();
        
        foreach ($this->data->mahasiswa_berdasarkan_angkatan as $key => $data) {
            if (!is_array($data)) continue;
            $this->jumlah_mahasiswa_diterima[] = $data['jumlah_mahasiswa_diterima'] ?? 0;
            $this->jumlah_mahasiswa[] = $data['jumlah_mahasiswa'] ?? 0;
        }
    }

    public function render()
    {
        return view('livewire.admin.sinkronisasi');
    }
}