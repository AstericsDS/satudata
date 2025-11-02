<?php

namespace App\Jobs;

use App\Services\MahasiswaService;
use App\Services\PDDIKTIService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use function PHPUnit\Framework\returnArgument;

class SyncMahasiswa implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */

    private MahasiswaService $mahasiswaService;

    public function __construct()
    {
        $this->mahasiswaService = new \App\Services\MahasiswaService();
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->mahasiswaService->synchronize();
    }
}
