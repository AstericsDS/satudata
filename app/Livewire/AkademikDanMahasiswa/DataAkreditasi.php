<?php

namespace App\Livewire\AkademikDanMahasiswa;

use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Data Akreditasi')]
class DataAkreditasi extends Component
{
    public function render()
    {
        return view('livewire.akademik-dan-mahasiswa.data-akreditasi');
    }
}
