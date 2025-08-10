<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\Mahasiswa;
use App\Services\MahasiswaSyncService;
use App\Services\DosenService;

#[Title('Dashboard')]
class Akademik extends Component
{
    // public $mhs;
    // public $dosen;
    // public $mhs_lulus;
    // public function mount(MahasiswaSyncService $mhs, DosenService $dosen)
    // {
    //     $this->mhs = $mhs->mhsCount();
    //     $this->dosen = $dosen->dosenCount();
    //     $this->mhs_lulus = $mhs->lulusCount();
    // }
    public function render()
    {
        return view('livewire.akademik', [
            
        ]);
    }
}