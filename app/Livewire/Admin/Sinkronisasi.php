<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Synchronize;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title('Dashboard Admin')]
#[Layout('components.layouts.admin')]
class Sinkronisasi extends Component
{
    public $sync;

    public function mount()
    {
        $this->sync = Synchronize::all();
    }

    public function render()
    {
        return view('livewire.admin.sinkronisasi');
    }
}