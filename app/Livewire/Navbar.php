<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;

class Navbar extends Component
{
    #[Title('Dashboard')]
    public function render()
    {
        return view('livewire.navbar');
    }
}
