<?php

namespace App\Livewire;

use App\Models\Data;
use App\Models\Fakultas;
use Livewire\Attributes\Computed;
use Livewire\Component;

class JumlahMahasiswa extends Component
{
    public $jenjang_pendidikan = ['D4', 'S1', 'S2', 'S3'];
    public $semester_list = ['121 - 2024/2025', '122 - 2024/2025'];
    public $fakultas_list = [];
    public $status_keaktifan = ['Semua', 'Aktif', 'Lulus'];
    public $kewarganegaraan = ['WNI', 'WNA'];
    public Data $data;
    public $jumlah_mahasiswa_diterima = [];
    public $jumlah_mahasiswa = [];
    
    public $selected_jenjang = null;
    public $selected_kode_fakultas = null;
    public $selected_graph_type = null;
    
    #[Computed]
    public function selectedFakultas() {
        if($this->selected_kode_fakultas) {
            return Fakultas::where('kode_fakultas', $this->selected_kode_fakultas)->first();
        }
        return null;
    }

    public function selectFakultas($kode_fakultas) {
        $this->selected_kode_fakultas = $kode_fakultas;
        // $fakultas = $this->selectedFakultas;
    }

    public function clearFakultas() {
        $this->selected_kode_fakultas = null;
    }
    
    public function selectGraphType($graph_type) {
        $this->selected_graph_type = $graph_type;
        
    }

    public function mount()
    {
        $this->fakultas_list = Fakultas::all();
        $this->data = Data::first();

        foreach ($this->data->mahasiswa_berdasarkan_angkatan as $data) {
            if (!is_array($data)) continue;
            $this->jumlah_mahasiswa_diterima[] = $data['jumlah_mahasiswa_diterima'] ?? 0;
            $this->jumlah_mahasiswa[] = $data['jumlah_mahasiswa'] ?? 0;
        }
    }
    
    public function render()
    {
        return view('livewire.jumlah-mahasiswa');
    }
}