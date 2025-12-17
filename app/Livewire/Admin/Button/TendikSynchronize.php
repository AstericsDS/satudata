<?php

namespace App\Livewire\Admin\Button;

use App\Jobs\SyncTendik;
use App\Models\Synchronize;
use Livewire\Component;

class TendikSynchronize extends Component
{
    public Synchronize $sync;

    public function process() {
        $this->sync->withoutTimestamps(function () {
            $this->sync->updateQuietly(['status' => 'synchronizing']);
        });

        SyncTendik::dispatch();
    }

    public function mount() {
        $this->sync = Synchronize::firstOrCreate(
            ['name' => 'Tendik'],
            ['status' => 'unsynchronized']
        );
    }

    public function render()
    {
        return view('livewire.admin.button.tendik-synchronize');
    }
}
