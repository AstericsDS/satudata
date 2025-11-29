<?php

namespace App\Livewire\AkademikDanMahasiswa;

use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Beban Mengajar')]
class BebanMengajar extends Component
{
    public function render()
    {
        return view('livewire.akademik-dan-mahasiswa.beban-mengajar');
    }
}
