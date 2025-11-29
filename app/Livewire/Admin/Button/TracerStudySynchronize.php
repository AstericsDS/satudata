<?php

namespace App\Livewire\Admin\Button;

use App\Models\Synchronize;
use App\Jobs\SyncTracerStudy;
use Livewire\Component;

class TracerStudySynchronize extends Component
{
    public Synchronize $sync;
    public function process()
    {
        $this->sync->withoutTimestamps(function() {
            $this->sync->updateQuietly(['status' => 'synchronizing']);
            SyncTracerStudy::dispatch($this->sync->id);
        });
    }
    public function mount()
    {
        $this->sync = Synchronize::firstOrCreate(
            ['name' => 'Tracer Study'],
            ['status' => 'unsynchronized']
        );
    }
    public function render()
    {
        return view('livewire.admin.button.tracer-study-synchronize');
    }
}
