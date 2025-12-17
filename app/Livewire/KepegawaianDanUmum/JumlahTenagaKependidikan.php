<?php

namespace App\Livewire\KepegawaianDanUmum;

use App\Models\Synchronize;
use App\Models\Tendik;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Jumlah Tenaga Kependidikan')]
class JumlahTenagaKependidikan extends Component
{
    // Data grafik
    public $data_tendik_pns;
    public $data_tendik_tetap;
    public $data_tendik_tidak_tetap;
    public $data_tendik_pppk;

    // Filter list
    public $unit_kerja = [];
    public $golongan = [];

    // Selected filter
    public $selected_unit_kerja = [];
    public $selected_golongan = [];

    // Toggle filter
    public $show_unit_kerja;
    public $show_golongan;

    // Another property
    public $update;

    private function calculateChartData() {
        $query = Tendik::query();

        // Filter unit kerja
        if($this->show_unit_kerja && $this->selected_unit_kerja) {
            $query->where('unit_kerja', $this->selected_unit_kerja);
        }

        // Filter golongan
        if ($this->show_golongan && $this->selected_golongan) {
            $query->where('golongan', $this->selected_golongan);
        }

        // Hitung kategori berdasarkan query yang sudah difilter
        // Clone query agar tidak menumpuk where clause
        $this->data_tendik_pns = (clone $query)->where('status_kepegawaian', 'Pegawai')->count();
        $this->data_tendik_tetap = (clone $query)->where('status_kepegawaian','Tendik Tetap')->count();
        $this->data_tendik_tidak_tetap = (clone $query)->where('status_kepegawaian','Tendik Tidak Tetap')->count();
        $this->data_tendik_pppk = (clone $query)->where('status_kepegawaian', 'PPPK_Tendik')->count();
    }

    public function mount() {
        $this->calculateChartData();

        $this->update = Synchronize::where('name', 'Tendik')->first() ?? null;

        $this->data_tendik_pns = Tendik::where('status_kepegawaian', 'Pegawai')->count();
        $this->data_tendik_tetap = Tendik::where('status_kepegawaian', 'Tendik Tetap')->count();
        $this->data_tendik_tidak_tetap = Tendik::where('status_kepegawaian', 'Tendik Tidak Tetap')->count();
        $this->data_tendik_pppk = Tendik::where('status_kepegawaian', 'PPPK_Tendik')->count();

        $this->unit_kerja = Tendik::pluck('unit_kerja')->unique()->values()->toArray();
        $this->golongan = Tendik::whereNotNull('golongan')->pluck('golongan')->unique()->values()->toArray();
    }

    public function updatedShowUnitKerja($value) {
        $this->selected_unit_kerja = $value ? $this->unit_kerja[0] : null;
    }

    public function updatedShowGolongan($value) {
        $this->selected_golongan = $value ? $this->golongan[0] : null;
    }

    public function deleteFilter() {
        $this->reset([
            'show_unit_kerja', 'selected_unit_kerja',
            'show_golongan', 'selected_golongan'
        ]);

        $this->applyFilter();
        $this->dispatch('clearFilter');
    }

    public function applyFilter() {
        $this->calculateChartData();
        $this->dispatch('update-chart-tendik', [
            'tendik_pns' => $this->data_tendik_pns,
            'tendik_tetap' => $this->data_tendik_tetap,
            'tendik_tidak_tetap' => $this->data_tendik_tidak_tetap,
            'tendik_pppk' => $this->data_tendik_pppk,
        ]);
        
    }

    public function render()
    {
        return view('livewire.kepegawaian-umum.jumlah-tenaga-kependidikan');
    }
}
