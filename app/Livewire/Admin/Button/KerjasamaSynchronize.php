<?php

namespace App\Livewire\Admin\Button;

use App\Jobs\SyncKerjasama;
use Livewire\Component;
use App\Models\Synchronize;

class KerjasamaSynchronize extends Component
{
    public Synchronize $sync;
    public function process()
    {
        $this->sync->withoutTimestamps(function () {
            $this->sync->updateQuietly(['status' => 'synchronizing']);
            SyncKerjasama::dispatch();
        });
    }
    public function mount()
    {
        $this->sync = Synchronize::firstOrCreate(
            ['name' => 'Kemitraan'],
            ['status' => 'unsynchronized']
        );
    }
    public function render()
    {
        return view('livewire.admin.button.kerjasama-synchronize');
    }
}
