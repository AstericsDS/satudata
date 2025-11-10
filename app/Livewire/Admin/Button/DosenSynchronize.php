<?php

namespace App\Livewire\Admin\Button;

use App\Jobs\SyncDosen;
use Livewire\Component;
use App\Models\Synchronize;

class DosenSynchronize extends Component
{
    public Synchronize $sync;
    public function process()
    {
        $this->sync->withoutTimestamps(function () {
            $this->sync->updateQuietly(['status' => 'synchronizing']);
        });

        SyncDosen::dispatch($this->sync->id);
    }
    public function mount()
    {
        $this->sync = Synchronize::firstOrCreate(
            ['name' => 'Dosen'],
            ['status' => 'unsynchronized']
        );
    }
    public function render()
    {
        return view('livewire.admin.button.dosen-synchronize');
    }
}
