<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;

class Test extends Component
{
    #[Title('Test Aja')]
    public function render()
    {
        return view('livewire.test');
    }
}
