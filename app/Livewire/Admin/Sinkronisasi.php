<?php

namespace App\Livewire\Admin;

use App\Models\Data;
use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Services\UNJDalamAngkaService;
use App\Services\MahasiswaAngkatanService;

#[Layout('components.layouts.admin')]
class Sinkronisasi extends Component
{
    public Data $data;
    public function unjDalamAngka(UNJDalamAngkaService $service)
    {
        $service->dosenCount();
        $service->mahasiswaCount();
        $service->wisudaCount();

        Data::where('id', 1)->update([
            'unj_dalam_angka->updated_at' => now('Asia/Jakarta')->locale('id')->translatedFormat('l, d F (H:i:s)')
        ]);
    }

    public function mahasiswaAngkatan(MahasiswaAngkatanService $service)
    {
        $service->synchronize();
        Data::where('id', 1)->update([
            'mahasiswa_berdasarkan_angkatan->updated_at' => now('Asia/Jakarta')->locale('id')->translatedFormat('l, d F (H:i:s)')
        ]);
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
