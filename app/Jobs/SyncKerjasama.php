<?php

namespace App\Jobs;

use Exception;
use App\Models\Synchronize;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Services\BisnisDanInovasi\KerjasamaService;

class SyncKerjasama implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    private KerjasamaService $service;
    public function __construct()
    {
        $this->service = new KerjasamaService();
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->service->synchronize();
    }
}
