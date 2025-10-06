<?php

namespace App\Livewire;

use App\Models\Data;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.app')]
class Test extends Component
{
    public Data $data;
    public $jumlah_mahasiswa_diterima = [];
    public $jumlah_mahasiswa = [];
    public $jumlah_mahasiswa_s1 = [];
    public $jumlah_mahasiswa_s2 = [];
    public $jumlah_mahasiswa_s3 = [];
    
    public function mount()
    {
        $this->data = Data::first();
        foreach ($this->data->mahasiswa_berdasarkan_angkatan as $data) {
            if (!is_array($data)) continue;
            $this->jumlah_mahasiswa_diterima[] = $data['jumlah_mahasiswa_diterima'] ?? 0;
            $this->jumlah_mahasiswa[] = $data['jumlah_mahasiswa'] ?? 0;
        }
        $this->jumlah_mahasiswa_s1 = $this->data->mahasiswa_berdasarkan_jenjang_pendidikan['jumlah_mahasiswa_s1'] ?? 0;
        $this->jumlah_mahasiswa_s2 = $this->data->mahasiswa_berdasarkan_jenjang_pendidikan['jumlah_mahasiswa_s2'] ?? 0;
        $this->jumlah_mahasiswa_s3 = $this->data->mahasiswa_berdasarkan_jenjang_pendidikan['jumlah_mahasiswa_s3'] ?? 0;
    }
    public function render()
    {
        return view('livewire.test');
    }
}
