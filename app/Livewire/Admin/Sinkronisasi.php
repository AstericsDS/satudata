<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.admin')]
class Sinkronisasi extends Component
{
    public function render()
    {
        return view('livewire.admin.sinkronisasi');
    }
}
