<?php

namespace App\Livewire\AkademikDanMahasiswa;

use Livewire\Component;
use App\Models\Mahasiswa;
use App\Models\Synchronize;
use Livewire\Attributes\Title;

#[Title('Jumlah Wisudawan')]
class JumlahWisudawan extends Component
{
    public $data, $data_2;
    public $jenjang, $fakultas, $prodi;
    public $selectedJenjang, $selectedFakultas, $selectedProdi;
    public $showJenjang, $showFakultas, $showProdi;
    public $month, $year, $lastYear;
    public $update;
    public $now, $before, $percentage;
    public function mount()
    {
        $order = ['S1', 'S2', 'S3', 'D3', 'D4'];
        $this->jenjang = Mahasiswa::pluck('jenjang')->unique()->sortBy(fn($x) => array_flip($order)[$x] ?? 999)->values()->toArray();
        $this->fakultas = Mahasiswa::pluck('fakultas')->unique()->values()->toArray();
        $this->prodi = Mahasiswa::pluck('program_studi')->unique()->values()->toArray();
        $this->month = now()->month;
        $this->year = $this->month >= 10 ? now()->year : now()->year - 1;
        $this->update = Synchronize::where('name', 'Mahasiswa dan Alumni')->first() ?? null;
        for ($i = $this->year - 7; $i <= $this->year; $i++) {
            $this->data[$i] = Mahasiswa::where('status', 'Lulus')->where('periode_masuk', 'LIKE', $i . '/' . $i + 1 . '%')->count();
            $this->data_2[$i] = Mahasiswa::where('periode_masuk', 'LIKE', $i . '/' . $i + 1 . '%')->count();
        }
    }
    public function updatedShowJenjang($value)
    {
        $this->selectedJenjang = $value ? $this->jenjang[0] : null;
        $this->updateFakultasOptions();
    }
    public function updatedShowFakultas($value)
    {
        $this->selectedFakultas = $value ? $this->fakultas[0] : null;
        $this->updateProdiOptions();
    }
    public function updatedShowProdi($value)
    {
        $this->selectedProdi = $value ? $this->prodi[0] : null;
    }
    public function updatedSelectedJenjang()
    {
        $this->updateFakultasOptions();
    }
    public function updatedSelectedFakultas()
    {
        $this->updateProdiOptions();
    }
    public function updateFakultasOptions()
    {
        if (!$this->selectedJenjang) {
            $this->fakultas = Mahasiswa::pluck('fakultas')->unique()->toArray();
            $this->prodi = Mahasiswa::pluck('program_studi')->unique()->toArray();
            if ($this->showFakultas) {
                $this->selectedFakultas = $this->fakultas[0] ?? null;
            }
            if ($this->showProdi) {
                $this->updateProdiOptions();
            }
            return;
        }

        $this->fakultas = Mahasiswa::where('jenjang', $this->selectedJenjang)->pluck('fakultas')->unique()->values()->toArray();
        $this->prodi = Mahasiswa::where('jenjang', $this->selectedJenjang)->pluck('program_studi')->unique()->values()->toArray();
        if ($this->showFakultas) {
            $this->selectedFakultas = $this->fakultas[0] ?? null;

        }
        if ($this->showProdi) {
            $this->updateProdiOptions();
        }
    }
    public function updateProdiOptions()
    {
        if (!$this->selectedFakultas && !$this->selectedJenjang) {
            $this->prodi = Mahasiswa::pluck('program_studi')->unique()->toArray();
            $this->selectedProdi = $this->prodi[0] ?? null;
            return;
        }

        $query = Mahasiswa::query();

        if ($this->selectedJenjang) {
            $query->where('jenjang', $this->selectedJenjang);
        }

        if ($this->selectedFakultas) {
            $query->where('fakultas', $this->selectedFakultas);
        }

        $this->prodi = $query->pluck('program_studi')->unique()->values()->toArray();

        if ($this->showProdi) {
            $this->selectedProdi = $this->prodi[0] ?? null;
        }
    }
    public function clearFilter()
    {
        $this->reset([
            'showJenjang',
            'showFakultas',
            'showProdi',
            'selectedJenjang',
            'selectedFakultas',
            'selectedProdi',
        ]);
    }
    public function applyFilter()
    {
        $this->data = [];
        $this->data_2 = [];
        for ($i = $this->year - 7; $i <= $this->year; $i++) {
            $query = Mahasiswa::query();
            if ($this->selectedJenjang)
                $query->where('jenjang', $this->selectedJenjang);
            if ($this->selectedFakultas)
                $query->where('fakultas', $this->selectedFakultas);
            if ($this->selectedProdi)
                $query->where('program_studi', $this->selectedProdi);
            $query->where('periode_masuk', 'LIKE', $i . '/' . ($i + 1) . '%');
            $this->data_2[$i] = $query->count();
            $query->where('status', 'Lulus');
            $this->data[$i] = $query->count();
        }
        $this->dispatch('refreshData', data: $this->data, data_2: $this->data_2);
    }
    public function render()
    {
        $filtered = array_filter($this->data_2, fn($v) => $v != 0);

        if (empty($filtered)) {
            $this->now = 0;
            $this->before = 0;
            $this->percentage = 0;
            return view('livewire.akademik-dan-mahasiswa.jumlah-wisudawan');
        }

        $index = array_key_last($filtered);
        $this->lastYear = $index;
        $this->now = $this->data_2[$index];

        $filteredKeys = array_keys($filtered);
        $currentPos = array_search($index, $filteredKeys);

        $beforeKey = $filteredKeys[$currentPos - 1] ?? null;
        $this->before = $beforeKey ? $this->data_2[$beforeKey] : 0;

        if ($this->before == 0) {
            $this->percentage = $this->now > 0 ? 100 : 0;
        } else {
            $this->percentage = number_format(
                (($this->now - $this->before) / $this->before) * 100,
                2
            );
        }
        return view('livewire.akademik-dan-mahasiswa.jumlah-wisudawan');
    }
}
