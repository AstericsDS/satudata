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

    // public function loadData() {
    //     $this->data = Data::first();

    //     foreach ($this->data->mahasiswa_berdasarkan_angkatan as $data) {
    //         if (!is_array($data)) continue;
    //         $this->jumlah_mahasiswa_diterima[] = $data['jumlah_mahasiswa_diterima'] ?? 0;
    //         $this->jumlah_mahasiswa[] = $data['jumlah_mahasiswa'] ?? 0;
    //     }

    //     $this->jumlah_dosen_s2[] = $data['jumlah_dosen_s2'] ?? 0;
    //     $this->jumlah_dosen_s3[] = $data['jumlah_dosen_s3'] ?? 0;
    // }

    // #[On('dosen-data-updated')]
    // public function refreshDataDosen() {
    //     $this->loadData();
    //     $this->dispatch('updateDosenChart', series: [$this->jumlah_dosen_s2, $this->jumlah_dosen_s3]);
    // }
    
    public function mount()
    {
        // $this->loadData();
        
        $this->data = Data::first();

        foreach ($this->data->mahasiswa_berdasarkan_angkatan as $data) {
            if (!is_array($data)) continue;
            $this->jumlah_mahasiswa_diterima[] = $data['jumlah_mahasiswa_diterima'] ?? 0;
            $this->jumlah_mahasiswa[] = $data['jumlah_mahasiswa'] ?? 0;
        }

        $this->jumlah_dosen_s2[] = $this->data->dosen_berdasarkan_pendidikan['jumlah_dosen_s2'] ?? 0;
        $this->jumlah_dosen_s3[] = $this->data->dosen_berdasarkan_pendidikan['jumlah_dosen_s3'] ?? 0;

        // foreach($this->data->dosen_berdasarkan_pendidikan as $data_dosen_pendidikan) {
        //     if (!is_array($data_dosen_pendidikan))
        //         continue;
        //     $this->jumlah_dosen_s2[] = $data_dosen_pendidikan['jumlah_s2'];
        //     $this->jumlah_dosen_s3[] = $data_dosen_pendidikan['jumlah_s3'];
        // }
    }
    
    public function render()
    {
        return view('livewire.akademik', [

        ]);
    }
}