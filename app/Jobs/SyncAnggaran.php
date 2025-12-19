<?php

namespace App\Jobs;

use App\Services\KeuanganDanPerencanaan\AnggaranService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class SyncAnggaran implements ShouldQueue
{
    use Queueable;
    private AnggaranService $anggaran_service;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        $this->anggaran_service = new AnggaranService();
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->anggaran_service->synchronize();
    }
}
