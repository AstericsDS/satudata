<?php

namespace App\Jobs;

use App\Models\Synchronize;
use App\Services\AkademikDanMahasiswa\MahasiswaService;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Throwable;

class SyncMahasiswa implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */

    private MahasiswaService $mahasiswaService;
    private $syncId;

    public function __construct($syncId)
    {
        $this->mahasiswaService = new MahasiswaService();
        $this->syncId = $syncId;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $sync = Synchronize::find($this->syncId);
        try {
            $this->mahasiswaService->synchronize();
            $sync->update(['status' => 'synchronized']);
        } catch (Throwable $error) {
            $sync->timestamps = false;
            $sync->update(['status' => 'error']);
            \Log::error("SyncMahasiswa failed for sync_id={$this->syncId}: " . $error->getMessage());
        }
    }
}
