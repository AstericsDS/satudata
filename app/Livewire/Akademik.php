<?php

namespace App\Livewire;

use App\Models\Data;
use Livewire\Component;
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
    public function mount()
    {
        $this->data = Data::first();

        foreach ($this->data->mahasiswa_berdasarkan_angkatan as $data) {
            if (!is_array($data)) continue;
            $this->jumlah_mahasiswa_diterima[] = $data['jumlah_mahasiswa_diterima'] ?? 0;
            $this->jumlah_mahasiswa[] = $data['jumlah_mahasiswa'] ?? 0;
        }
    }
    public function render()
    {
        return view('livewire.akademik', [

        ]);
    }
}