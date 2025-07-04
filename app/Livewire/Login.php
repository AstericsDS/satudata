<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;

class Login extends Component
{
    #[Title('Login')]

    public function render()
    {
        return view('livewire.login')->layout('components.layouts.login');
    }
}
