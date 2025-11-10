<?php

namespace App\Livewire\Admin\Button;

use App\Jobs\SyncMahasiswa;
use Livewire\Component;
use App\Models\Synchronize;

class MahasiswaSynchronize extends Component
{
    public Synchronize $sync;
    public function process()
    {
        $this->sync->withoutTimestamps(function () {
            $this->sync->updateQuietly(['status' => 'synchronizing']);
        });
    
        SyncMahasiswa::dispatch($this->sync->id);
    }
    public function mount()
    {
        $this->sync = Synchronize::firstOrCreate(
            ['name' => 'Mahasiswa dan Alumni'],
            ['status' => 'unsynchronized']
        );
    }

    public function render()
    {
        return view('livewire.admin.button.mahasiswa-synchronize');
    }
}
