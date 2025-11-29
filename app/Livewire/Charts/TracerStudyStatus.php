<?php

namespace App\Livewire\Charts;

use Livewire\Component;

class TracerStudyStatus extends Component
{
    public $data;
    public function mount($data)
    {
        $this->data = $data;
    }
    public function render()
    {
        return view('livewire.charts.tracer-study-status');
    }
}
