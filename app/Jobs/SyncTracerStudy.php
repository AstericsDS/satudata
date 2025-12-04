<?php

namespace App\Jobs;

use Throwable;
use App\Models\Synchronize;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Services\AkademikDanMahasiswa\TracerStudyService;

class SyncTracerStudy implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    private TracerStudyService $service;
    public function __construct()
    {
        $this->service = new TracerStudyService();
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->service->synchronize();
    }
}
