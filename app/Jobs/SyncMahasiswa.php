<?php

namespace App\Jobs;

use App\Services\AkademikDanMahasiswa\MahasiswaService;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class SyncMahasiswa implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */

    private MahasiswaService $mahasiswaService;
    public function __construct()
    {
        $this->mahasiswaService = new MahasiswaService();
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->mahasiswaService->synchronize();
    }
}
