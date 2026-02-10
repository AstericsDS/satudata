<?php

namespace App\Livewire\AkademikDanMahasiswa;

use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Sebaran Mahasiswa')]
class SebaranMahasiswa extends Component
{
    public function render()
    {
        return view('livewire.akademik-dan-mahasiswa.sebaran-mahasiswa');
    }
}
