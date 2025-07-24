<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;

class Navbar extends Component
{
    public function render()
    {
        return view('livewire.navbar')->slot('navbar');
    }
}
