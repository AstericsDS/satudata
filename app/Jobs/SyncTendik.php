<?php

namespace App\Jobs;

use App\Services\KepegawaianDanUmum\TendikService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class SyncTendik implements ShouldQueue
{
    use Queueable;

    private TendikService $tendik_service;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        $this->tendik_service = new TendikService();
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->tendik_service->synchronize();
    }
}
