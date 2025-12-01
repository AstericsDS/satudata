<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Jumlah Tenaga Kependidikan')]
class JumlahTenagaKependidikan extends Component
{
    public function render()
    {
        return view('livewire.kepegawaian-umum.jumlah-tenaga-kependidikan');
    }
}
