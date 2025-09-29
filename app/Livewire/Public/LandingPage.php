<?php

namespace App\Livewire\Public;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.landing-page')]
class LandingPage extends Component
{
    public function render()
    {
        return view('livewire.public.landing-page');
    }
}
