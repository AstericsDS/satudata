<?php

namespace App\Livewire;

use Livewire\Component;

class JumlahMahasiswa extends Component
{
    public $jenjang_pendidikan = ['D4', 'S1', 'S2', 'S3'];
    public $semester_list = ['121 - 2024/2025', '122 - 2024/2025'];
    public $fakultas_list = [
        'FMIPA' => 'Fakultas Matematika dan Ilmu Pengetahuan Alam',
        'FT' => 'Fakultas Teknik'
    ];
    public $prodi_list = [
        'FMIPA' => ['Ilmu Komputer', 'Matematika', 'Kimia'],
        'FT' => ['Pendidikan Teknologi Informatika', 'Teknik Elektro', 'Teknik Mesin'] 
    ];
    public $status_keaktifan = ['Semua', 'Aktif', 'Lulus'];
    public $kewarganegaraan = ['WNI', 'WNA'];
    
    public $selected_jenjang = null;
    public $selected_fakultas = null;
    public $selected_prodi = [];
    public $prodi_fakultas = [];
    public $selected_graph_type = null;
    
    public function selectFakultas($fakultas) {
        $this->selected_fakultas = $fakultas;
        $this->prodi_fakultas = $this->prodi_list[$fakultas] ?? [];
        $this->selected_prodi = [];
    }

    public function toggleProdi($prodi) {
        if(in_array($prodi, $this->selected_prodi)) {
            $this->selected_prodi = array_diff($this->selected_prodi, [$prodi]);
        } else {
            $this->selected_prodi[] = $prodi;
        }
    }
    
    public function selectGraphType($graph_type) {
        $this->selected_graph_type = $graph_type;
        
    }
    
    public function render()
    {
        return view('livewire.jumlah-mahasiswa');
    }
}