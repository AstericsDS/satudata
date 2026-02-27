<?php

namespace App\Livewire\KepegawaianDanUmum;

use App\Models\Dosen;
use App\Models\Synchronize;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Profil Kepakaran Dosen')]
class ProfilKepakaranDosen extends Component
{
    // Data grafik
    public $data_asisten_ahli;
    public $data_lektor;
    public $data_lektor_kepala;
    public $data_profesor;
    public $data_arsiparis;

    // Filter list
    public $jabatan_fungsional = [];
    public $pendidikan_terakhir = [];
    public $fakultas = [];
    public $prodi = [];
    public $gender = [];
    public $status_kepegawaian = [];

    // Selected filter
    public $selected_jabatan_fungsional;
    public $selected_pendidikan_terakhir;
    public $selected_fakultas;
    public $selected_prodi;
    public $selected_gender;
    public $selected_status_kepegawaian;

    // Toggle filter
    public $show_jabatan_fungsional;
    public $show_pendidikan_terakhir;
    public $show_fakultas;
    public $show_prodi;
    public $show_gender;
    public $show_status_kepegawaian;

    // Another property
    public $update;

    public function mount()
    {
        $this->calculateChartData();

        $this->update = Synchronize::where('name', 'Dosen')->first() ?? null;

        $this->data_asisten_ahli = Dosen::whereJsonContains('jabatan', 'Asisten Ahli')->count();
        
        $this->data_lektor = Dosen::whereJsonContains('jabatan', 'Lektor')->count();

        $this->data_lektor_kepala = Dosen::whereJsonContains('jabatan', 'Lektor Kepala')->count();

        $this->data_profesor = Dosen::whereJsonContains('jabatan', 'Profesor')->count();

        $this->data_arsiparis = Dosen::where(function($query) {
            $query->whereJsonContains('jabatan', 'Arsiparis Muda')
                  ->orWhereJsonContains('jabatan', 'Arsiparis Madya');
        })->count();
        
        $this->jabatan_fungsional = Dosen::whereNotNull('jabatan')->pluck('jabatan')->flatten()->unique()->values()->toArray();

        $this->pendidikan_terakhir = ['S2', 'S3'];

        $this->fakultas = Dosen::pluck('unit')->unique()->values()->toArray();

        $this->prodi = Dosen::pluck('prodi')->unique()->values()->toArray();

        $this->gender = [
            'L' => 'Laki-laki',
            'P' => 'Perempuan'
        ];

        $this->status_kepegawaian = [
            'Dosen' => 'Dosen PNS',
            'Dosen Tetap' => 'Dosen Tetap',
            'Dosen Tidak Tetap' => 'Dosen Tidak Tetap',
            'PPPK_Dosen' => 'Dosen PPPK'
        ];
    }

    public function updatedShowJabatanFungsional($value)
    {
        $this->selected_jabatan_fungsional = $value ? ($this->jabatan_fungsional[0] ?? null) : null;
    }

    public function updatedShowPendidikanTerakhir($value)
    {
        $this->selected_pendidikan_terakhir = $value ? 'S2' : null;
    }

    public function updatedShowFakultas($value)
    {
        $this->selected_fakultas = $value ? ($this->fakultas[0] ?? null) : null;
        $this->updateProdiOptions();
    }

    public function updatedSelectedFakultas($value)
    {
        $this->updateProdiOptions();
    }

    public function updateProdiOptions()
    {
        if(!$this->selected_fakultas) {
            $this->prodi = Dosen::pluck('prodi')->unique()->toArray();
            // $this->selected_prodi = $this->prodi[0] ?? null;
            // return;
        } else {
            $this->prodi = Dosen::where('unit', $this->selected_fakultas)->pluck('prodi')->unique()->values()->toArray();
        }

        if($this->show_prodi && !empty($this->prodi)) {
            $this->selected_prodi = $this->prodi[0] ?? null;
        }

        // $query = Dosen::query();

        // if($this->selected_fakultas) {
        //     $query->where('unit', $this->selected_fakultas);
        // }

        // $this->prodi = $query->pluck('prodi')->unique()->values()->toArray();

        // if($this->show_prodi) {
        //     $this->selected_prodi = $this->prodi[0] ?? null;
        // }

    }

    public function updatedShowProdi($value)
    {
        $this->selected_prodi = $value ? ($this->prodi[0] ?? null) : null;
    }

    public function updatedShowGender($value)
    {
        $this->selected_gender = $value ? array_key_first($this->gender) : null;
    }

    public function updatedShowStatus($value)
    {
        $this->selected_status_kepegawaian = $value ? array_key_first($this->status_kepegawaian) : null;
    }

    public function deleteFilter()
    {
        $this->reset([
            'show_jabatan_fungsional',
            'selected_jabatan_fungsional',
            'show_pendidikan_terakhir',
            'selected_pendidikan_terakhir',
            'show_fakultas',
            'selected_fakultas',
            'show_prodi',
            'selected_prodi',
            'show_gender',
            'selected_gender',
            'show_status_kepegawaian',
            'selected_status_kepegawaian'
        ]);

        $this->prodi = Dosen::pluck('prodi')->unique()->values()->toArray();
        $this->applyFilter();
        $this->dispatch('clearFilter');
    }

    public function applyFilter()
    {
        $this->calculateChartData();
        $this->dispatch('update-chart-dosen', [
            'asisten_ahli' => $this->data_asisten_ahli,
            'lektor' => $this->data_lektor,
            'lektor_kepala' => $this->data_lektor_kepala,
            'profesor' => $this->data_profesor,
            'arsiparis' => $this->data_arsiparis
        ]);
    }

    private function calculateChartData()
    {
        $query = Dosen::query();

        // Filter jabatan 
        if ($this->show_jabatan_fungsional && $this->selected_jabatan_fungsional) {
            $query->where('jabatan', $this->selected_jabatan_fungsional);
        }

        // Filter pendidikan
        if ($this->show_pendidikan_terakhir && $this->selected_pendidikan_terakhir) {
            if ($this->selected_pendidikan_terakhir === 'S3') {
                $query->where('gelar', 'LIKE', '%Dr.%'); // Sesuaikan dengan format database
            } else if ($this->selected_pendidikan_terakhir === 'S2') {
                $query->where('gelar', 'LIKE', '%M.%')->orWhere('gelar', 'LIKE', '%Magister%');
            }
        }

        // Filter fakultas
        if ($this->show_fakultas && $this->selected_fakultas) {
            $query->where('unit', $this->selected_fakultas);
        }

        // Filter prodi
        if ($this->show_prodi && $this->selected_prodi) {
            $query->where('prodi', $this->selected_prodi);
        }

        // Filter gender
        if ($this->show_gender && $this->selected_gender) {
            $query->where('gender', $this->selected_gender);
        }

        // Filter status kepegawaian
        if ($this->show_status_kepegawaian && $this->selected_status_kepegawaian) {
            
            $query->where('status', $this->selected_status_kepegawaian); 
        }

        // Hitung kategori berdasarkan query yang sudah difilter
        // Clone query agar tidak menumpuk where clause
        $this->data_asisten_ahli = (clone $query)->whereJsonContains('jabatan', 'Asisten Ahli')->count();
        $this->data_lektor = (clone $query)->whereJsonContains('jabatan', 'Lektor')->count();
        $this->data_lektor_kepala = (clone $query)->whereJsonContains('jabatan', 'Lektor Kepala')->count();
        $this->data_profesor = (clone $query)->whereJsonContains('jabatan', 'Profesor')->count();
        $this->data_arsiparis = (clone $query)->where(function($query) {
            $query->whereJsonContains('jabatan', 'Arsiparis Muda')
                  ->orWhereJsonContains('jabatan', 'Arsiparis Madya');
        })->count();
    }

    public function render()
    {
        return view('livewire.kepegawaian-umum.profil-kepakaran-dosen');
    }
}
