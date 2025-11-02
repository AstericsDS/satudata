<?php

namespace App\Livewire;

use App\Jobs\DebugJob as Wongky;
use Livewire\Component;

class Debug extends Component
{
    // public $startTime;
    // public $elapsedTime;
    // public $startTime2;
    // public $elapsedTime2;
    // public function fakeData()
    // {
    //     $job = new Wongky();
    //     $this->startTime2 = microtime(true);
    //     Wongky::dispatchSync($job);
    //     $this->elapsedTime2 = round(microtime(true) - $this->startTime2, 2);
    // }
    // public function syncData()
    // {
    //     $job = new Wongky();
    //     $this->startTime = microtime(true);
    //     Wongky::dispatchSync($job);
    //     $this->elapsedTime = round(microtime(true) - $this->startTime, 2);
    // }
    public function render()
    {
        return view('livewire.debug');
    }
}
