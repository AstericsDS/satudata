<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Services\UNJDalamAngkaService;
use App\Models\Data;

#[Layout('components.layouts.admin')]
class Sinkronisasi extends Component
{
    public Data $data;
    public function unjDalamAngka(UNJDalamAngkaService $service)
    {
        $service->dosenCount();
        $service->mahasiswaCount();
        $service->wisudaCount();

        $this->data->updated_at = now();
        $this->data->save();
    }


    public function mount()
    {
        $this->data = Data::first();
    }

    public function render()
    {
        return view('livewire.admin.sinkronisasi');
    }
}
