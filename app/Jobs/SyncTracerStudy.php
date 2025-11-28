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
    private $syncId;
    public function __construct($syncId)
    {
        $this->service = new TracerStudyService();
        $this->syncId = $syncId;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $sync = Synchronize::find($this->syncId);
        try {
            $this->service->synchronize();
            $sync->update(['status' => 'synchronized']);
        } catch (Throwable $err) {
            Log::error("Tracer Study synchronize failed, id: {$this->syncId}. Error: " . $err->getMessage());
        }
    }
}
