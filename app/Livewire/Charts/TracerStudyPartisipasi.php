<?php

namespace App\Livewire\Charts;

use Livewire\Attributes\On;
use Livewire\Component;

class TracerStudyPartisipasi extends Component
{
    public $data;
    public function mount($data)
    {
        $this->data = $data;
    }
    public function render()
    {
        return view('livewire.charts.tracer-study-partisipasi');
    }
}
