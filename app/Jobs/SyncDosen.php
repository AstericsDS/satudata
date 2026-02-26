<?php

namespace App\Jobs;

use App\Services\AkademikDanMahasiswa\DosenService;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class SyncDosen implements ShouldQueue
{
    use Queueable;
    private DosenService $dosenService;
    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        $this->dosenService = new DosenService();
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->dosenService->synchronize();
    }
}
