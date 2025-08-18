<?php

namespace App\Livewire;

use App\Models\Data;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Mahasiswa;
use App\Services\DosenService;
use Livewire\Attributes\Title;
use App\Services\MahasiswaSyncService;

#[Title('Dashboard')]
class Akademik extends Component
{
    public Data $data;
    public $jumlah_mahasiswa_diterima = [];
    public $jumlah_mahasiswa = [];
    public $jumlah_dosen_s2 = [];
    public $jumlah_dosen_s3 = [];
    public $jumlah_dosen_plp = [];
    public $jumlah_dosen_asisten = [];
    public $jumlah_dosen_lektor = [];
    public $jumlah_dosen_lektor_kepala = [];
    public $jumlah_dosen_profesor = [];
    
    public function mount()
    {
        $this->data = Data::first();

        foreach ($this->data->mahasiswa_berdasarkan_angkatan as $data) {
            if (!is_array($data)) continue;
            $this->jumlah_mahasiswa_diterima[] = $data['jumlah_mahasiswa_diterima'] ?? 0;
            $this->jumlah_mahasiswa[] = $data['jumlah_mahasiswa'] ?? 0;
        }

        $this->jumlah_dosen_s2[] = $this->data->dosen_berdasarkan_pendidikan['jumlah_dosen_s2'] ?? 0;
        $this->jumlah_dosen_s3[] = $this->data->dosen_berdasarkan_pendidikan['jumlah_dosen_s3'] ?? 0;

        $this->jumlah_dosen_plp[] = $this->data->dosen_berdasarkan_jabatan_fungsional['jumlah_dosen_plp'] ?? 0;
        $this->jumlah_dosen_asisten[] = $this->data->dosen_berdasarkan_jabatan_fungsional['jumlah_dosen_asisten'] ?? 0;
        $this->jumlah_dosen_lektor[] = $this->data->dosen_berdasarkan_jabatan_fungsional['jumlah_dosen_lektor'] ?? 0;
        $this->jumlah_dosen_lektor_kepala[] = $this->data->dosen_berdasarkan_jabatan_fungsional['jumlah_dosen_lektor_kepala'] ?? 0;
        $this->jumlah_dosen_profesor[] = $this->data->dosen_berdasarkan_jabatan_fungsional['jumlah_dosen_profesor'] ?? 0;
    }
    
    public function render()
    {
        return view('livewire.akademik', [

        ]);
    }
}