<?php

namespace App\Livewire\Charts;

use Livewire\Component;
use App\Models\Mahasiswa;

class JumlahMahasiswa extends Component
{
    public $data, $data_2;
    public $year, $month;
    public function mount()
    {
        $this->month = now()->month;
        $this->year = $this->month >= 10 ? now()->year : now()->year - 1;
        for ($i = $this->year - 7; $i <= $this->year; $i++) {
            $this->data[$i] = Mahasiswa::where('status', 'Aktif')->where('periode_masuk', 'LIKE', $i . '/' . $i + 1 . '%')->count();
            $this->data_2[$i] = Mahasiswa::where('periode_masuk', 'LIKE', $i . '/' . $i + 1 . '%')->count();
        }
    }
    public function render()
    {
        return view('livewire.charts.jumlah-mahasiswa');
    }
}
