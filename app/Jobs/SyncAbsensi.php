<?php

namespace App\Jobs;

use App\Services\KepegawaianDanUmum\AbsensiService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class SyncAbsensi implements ShouldQueue
{
    use Queueable;
    private AbsensiService $service;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        $this->service = new AbsensiService();
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->service->synchronize();
    }
}
