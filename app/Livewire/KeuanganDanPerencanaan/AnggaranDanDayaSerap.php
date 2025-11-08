<?php

namespace App\Livewire\KeuanganDanPerencanaan;

use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Anggaran dan Daya Serap')]
class AnggaranDanDayaSerap extends Component
{
    public function render()
    {
        return view('livewire.keuangan-dan-perencanaan.anggaran-dan-daya-serap');
    }
}
