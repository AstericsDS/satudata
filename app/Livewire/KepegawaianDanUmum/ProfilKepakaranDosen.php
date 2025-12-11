<?php

namespace App\Livewire\KepegawaianDanUmum;

use App\Models\Dosen;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Profil Kepakaran Dosen')]
class ProfilKepakaranDosen extends Component
{
    // Filter list
    public $jabatan_fungsional = [];
    public $pendidikan_terakhir = []; 
    public $fakultas = [];
    public $prodi = [];
    public $gender = [];
    public $status_kepegawaian = [];

    // Selected filter
    public $selected_jabatan_fungsional, $selected_pendidikan_terakhir, $selected_fakultas, $selected_prodi, $selected_gender, $selected_status_kepegawaian;

    // Toggle filter
    public $show_jabatan_fungsional, $show_pendidikan_terakir, $show_fakultas, $show_prodi, $show_gender, $show_status_kepegawaian;

    public $update;
    public $now, $before, $percentage;


    public function mount() {
        $this->jabatan_fungsional = Dosen::pluck('jabatan')->whereNotNull('jabatan')->unique()->values()->toArray();

        $this->pendidikan_terakhir = ['S2', 'S3'];

        $this->fakultas = Dosen::pluck('unit')->unique()->values()->toArray();

        $this->prodi = Dosen::pluck('prodi')->unique()->values()->toArray();

        $this->gender = ['Laki-laki', 'Perempuan'];

        $this->status_kepegawaian = [
            'Dosen' => 'Dosen PNS',
            'Dosen Tetap' => 'Dosen Tetap',
            'Dosen Tidak Tetap' => 'Dosen Tidak Tetap',
            'PPPK_Dosen' => 'Dosen PPPK'
        ];
    }

    public function updatedShowJabatanFungsional($value) {
        $this->selected_jabatan_fungsional = $value ? ($this->jabatan_fungsional[0] ?? null) : null;
    }

    public function updatedShowPendidikanTerakhir($value) {
        $this->selected_pendidikan_terakhir = $value ? 'S2' : null;
    }

    public function updatedShowFakultas($value) {
        $this->selected_fakultas = $value ? $this->fakultas[0] : null;
        $this->updateProdiOptions();
    } 

    public function updatedSelectedFakultas() {
        $this->updateProdiOptions();
    }

    public function updateProdiOptions() {
        if(!$this->selected_fakultas) {
            $this->prodi = Dosen::pluck('prodi')->unique()->toArray();
            $this->selected_prodi = $this->prodi[0] ?? null;
            return;
        }

        $query = Dosen::query();

        if($this->selected_fakultas) {
            $query->where('unit', $this->selected_fakultas);
        }

        $this->prodi = $query->pluck('prodi')->unique()->values()->toArray();

        if($this->show_prodi) {
            $this->selected_prodi = $this->prodi[0] ?? null;
        }
    }

    public function updatedShowProdi($value) {
        $this->selected_prodi = $value ? $this->prodi[0] : null;
    }

    public function updatedShowGender($value) {
        $this->selected_gender = $value ? 'Laki-laki' : null;
    }

    public function updatedShowStatus($value) {
        $this->selected_status_kepegawaian = $value ? array_key_first($this->status_kepegawaian) : null;
    }

    public function deleteFilter() {
        $this->reset([
            'show_jabatan_fungsional', 'selected_jabatan_fungsional',
            'show_pendidikan_terakhir', 'selected_pendidikan terakhir',
            'show_fakultas', 'selected_fakultas',
            'show_prodi', 'selected_prodi',
            'show_gender', 'selected_gender',
            'show_status_kepegawaian', 'selected_status_kepegawaian'
        ]);
        $this->dispatch('clearFilter');
    }

    public function applyFilter() {
        $query = Dosen::query();

        // Filter jabatan fungsional
        if($this->selected_jabatan_fungsional) {
            $query->where('jabatan', $this->selected_jabatan_fungsional);
        }

        // Filter pendidikan terakhir
        if($this->selected_pendidikan_terakhir) {
            if($this->selected_pendidikan_terakhir === 'S3') {
                $query->where(function($q) {
                    $q->where('gelar', 'LIKE', '%Dr. %');
                });
            } else if($this->selected_pendidikan_terakhir === 'S2') {
                $query->where(function($q) {
                    $q->where('gelar','LIKE', 'Magister');
                });
            }
        }

        // Filter fakultas
        if($this->selected_fakultas) {
            $query->where('unit', $this->selected_fakultas);
        }

        // Filter prodi
        if($this->selected_prodi) {
            $query->where('prodi', $this->selected_prodi);
        }

        // Filter gender
        if($this->selected_gender) {
            $query->where('gender', $this->selected_gender);
        }
    }

    public function render()
    {
        return view('livewire.kepegawaian-umum.profil-kepakaran-dosen');
    }
}
