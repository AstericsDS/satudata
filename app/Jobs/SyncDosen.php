<?php

namespace App\Jobs;

use App\Models\Synchronize;
use App\Services\AkademikDanMahasiswa\DosenService;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Throwable;

class SyncDosen implements ShouldQueue
{
    use Queueable;
    private DosenService $dosenService;
    private $syncId;

    /**
     * Create a new job instance.
     */
    public function __construct($syncId)
    {
        $this->dosenService = new DosenService();
        $this->syncId = $syncId;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $sync = Synchronize::find($this->syncId);
        try {
            $this->dosenService->synchronize();
            $sync->update(['status' => 'synchronized']);
        } catch (Throwable $e) {
            $sync->timestamps = false;
            $sync->update(['status' => 'error']);
            \Log::error("SyncDosen failed for sync_id={$this->syncId}: " . $e->getMessage());
        }
    }
}
