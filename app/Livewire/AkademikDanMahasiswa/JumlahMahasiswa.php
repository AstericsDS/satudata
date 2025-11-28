<?php

namespace App\Livewire\AkademikDanMahasiswa;

use Livewire\Component;
use App\Models\Mahasiswa;
use App\Models\Synchronize;
use Livewire\Attributes\Title;

#[Title('Jumlah Mahasiswa')]
class JumlahMahasiswa extends Component
{
    public $data, $data_2;
    public $jenjang, $semester, $fakultas, $prodi, $status;
    public $selectedJenjang, $selectedFakultas, $selectedProdi, $selectedStatus;
    public $showJenjang, $showFakultas, $showProdi, $showStatus;
    public $month, $year, $lastYear;
    public $update;
    public $now, $before, $percentage;
    public $statusDetail;
    public function mount()
    {
        $order = ['S1', 'S2', 'S3', 'D3', 'D4'];
        $this->jenjang = Mahasiswa::pluck('jenjang')->unique()->sortBy(fn($x) => array_flip($order)[$x] ?? 999)->values()->toArray();
        $this->fakultas = Mahasiswa::pluck('fakultas')->unique()->values()->toArray();
        $this->prodi = Mahasiswa::pluck('program_studi')->unique()->values()->toArray();
        $this->status = Mahasiswa::pluck('status')->unique()->values()->toArray();
        $this->month = now()->month;
        $this->year = $this->month >= 10 ? now()->year : now()->year - 1;
        $this->update = Synchronize::where('name', 'Mahasiswa dan Alumni')->first()->updated_at ?? null;
        for ($i = $this->year - 7; $i <= $this->year; $i++) {
            $this->data[$i] = Mahasiswa::where('status', 'Aktif')->where('periode_masuk', 'LIKE', $i . '/' . $i + 1 . '%')->count();
            $this->data_2[$i] = Mahasiswa::where('periode_masuk', 'LIKE', $i . '/' . $i + 1 . '%')->count();
        }
    }
    public function updatedShowJenjang($value)
    {
        $this->selectedJenjang = $value ? $this->jenjang[0] : null;

        $this->updateFakultasOptions();

    }
    public function updatedSelectedJenjang()
    {
        $this->updateFakultasOptions();
    }
    public function updatedShowFakultas($value)
    {
        $this->selectedFakultas = $value ? $this->fakultas[0] : null;


        $this->updateProdiOptions();

    }
    public function updatedSelectedFakultas()
    {
        $this->updateProdiOptions();
    }

    public function updatedShowProdi($value)
    {
        $this->selectedProdi = $value ? $this->prodi[0] : null;
    }
    public function updatedShowStatus($value)
    {
        $this->selectedStatus = $value ? $this->status[0] : null;
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
    public function deleteFilter()
    {
        $this->reset([
            'showJenjang',
            'selectedJenjang',
            'showFakultas',
            'selectedFakultas',
            'showProdi',
            'selectedProdi',
            'showStatus',
            'selectedStatus'
        ]);
        $this->dispatch('clearFilter');
    }
    public function applyFilter()
    {
        $this->data = [];
        $this->data_2 = [];
        if ($this->selectedStatus) {
            $this->statusDetail = $this->selectedStatus;
        }
        for ($i = $this->year - 7; $i <= $this->year; $i++) {
            $query = Mahasiswa::query();
            if ($this->selectedJenjang)
                $query->where('jenjang', $this->selectedJenjang);
            if ($this->selectedFakultas)
                $query->where('fakultas', $this->selectedFakultas);
            if ($this->selectedProdi)
                $query->where('program_studi', $this->selectedProdi);
            if ($this->selectedStatus)
                $query->where('status', $this->selectedStatus);
            $query->where('periode_masuk', 'LIKE', $i . '/' . ($i + 1) . '%');
            $this->data_2[$i] = $query->count();
            $query->where('status', 'Aktif');
            $this->data[$i] = $query->count();
        }
        if (!$this->selectedStatus) {
            $this->dispatch('refreshData', data: $this->data, data_2: $this->data_2);
        } else {
            $this->dispatch('refreshData', data_2: $this->data_2);
        }
    }
    public function render()
    {
        $filtered = array_filter($this->data_2, fn($v) => $v != 0);

        if (empty($filtered)) {
            $this->now = 0;
            $this->before = 0;
            $this->percentage = 0;
            return view('livewire.akademik-dan-mahasiswa.jumlah-mahasiswa');
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

        return view('livewire.akademik-dan-mahasiswa.jumlah-mahasiswa');
    }

}
