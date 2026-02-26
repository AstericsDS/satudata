<?php

namespace App\Livewire\Admin\Button;

use App\Jobs\SyncAbsensi;
use App\Models\Synchronize;
use Livewire\Component;

class AbsensiSynchronize extends Component
{
    public Synchronize $sync;
    public function process()
    {
        $this->sync->withoutTimestamps(function () {
            $this->sync->updateQuietly(['status' => 'synchronizing']);
        });

        SyncAbsensi::dispatch();
    }

    public function mount()
    {
        $this->sync = Synchronize::firstOrCreate(
            ['name' => 'Absensi Pegawai'],
            ['status' => 'unsynchronized'],
        );
    }
    public function render()
    {
        return view('livewire.admin.button.absensi-synchronize');
    }
}
