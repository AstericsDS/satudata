<?php

namespace App\Livewire\AkademikDanMahasiswa;

use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Rasio Dosen dan Mahasiswa')]
class RasioDosenMahasiswa extends Component
{
    public function render()
    {
        return view('livewire.akademik-dan-mahasiswa.rasio-dosen-mahasiswa');
    }
}
