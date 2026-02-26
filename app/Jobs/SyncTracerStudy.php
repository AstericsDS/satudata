<?php

namespace App\Jobs;

use App\Models\Synchronize;
use App\Services\AkademikDanMahasiswa\TracerStudyService;
use Exception;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;

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
