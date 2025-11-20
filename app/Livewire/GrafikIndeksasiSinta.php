<?php
namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Grafik Indeksasi Sinta')]
class GrafikIndeksasiSinta extends Component
{
    public function render()
    {
        return view('livewire.publikasi.grafik-indeksasi-sinta');
    }
}
