<?php

namespace App\Livewire\AkademikDanMahasiswa;

use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Tracer Study')]
class TracerStudy extends Component
{
    public function render()
    {
        return view('livewire.akademik-dan-mahasiswa.tracer-study');
    }
}
