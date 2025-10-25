<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.login')]
class Login extends Component
{
    #[Title('Login')]

    public function render()
    {
        return view('livewire.login');
    }
}
