<?php

namespace App\Livewire\KepegawaianDanUmum;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Temukan Pegawai')]
class TemukanPegawai extends Component
{
    public function render()
    {
        return view('livewire.kepegawaian-umum.temukan-pegawai');
    }
}
