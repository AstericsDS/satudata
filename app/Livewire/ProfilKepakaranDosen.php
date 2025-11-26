<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Profil Kepakaran Dosen')]
class ProfilKepakaranDosen extends Component
{
    public function render()
    {
        return view('livewire.kepegawaian-umum.profil-kepakaran-dosen');
    }
}
