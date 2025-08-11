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
    // public $mhs;
    // public $dosen;
    // public $mhs_lulus;
    // public function mount(MahasiswaSyncService $mhs, DosenService $dosen)
    // {
    //     $this->mhs = $mhs->mhsCount();
    //     $this->dosen = $dosen->dosenCount();
    //     $this->mhs_lulus = $mhs->lulusCount();
    // }
    public function mount()
    {
        $this->data = Data::first();
    }
    public function render()
    {
        return view('livewire.akademik', [
            
        ]);
    }
}