<?php

namespace App\Livewire\Admin\Button;

use App\Jobs\SyncAnggaran;
use App\Models\Synchronize;
use Livewire\Component;

class AnggaranSynchronize extends Component
{
    public Synchronize $sync;

    public function process() {
        $this->sync->withoutTimestamps(function () {
            $this->sync->updateQuietly(['status' => 'synchronizing']);
        });

        SyncAnggaran::dispatch();
    }

    public function mount() {
        $this->sync = Synchronize::firstOrCreate(
            ['name' => 'Anggaran dan Daya Serap'],
            ['status' => 'unsynchronized'],
        );
    }

    public function render()
    {
        return view('livewire.admin.button.anggaran-synchronize');
    }
}
