<?php

namespace App\Jobs;

use App\Models\Debug;
use App\Models\Synchronize;
use Faker\Factory as Faker;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class GenerateUsers implements ShouldQueue
{
    use Queueable;

    protected $syncId;

    /**
     * Create a new job instance.
     */
    public function __construct($syncId)
    {
        $this->syncId = $syncId;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        
        $sync = Synchronize::find($this->syncId);
        $faker = Faker::create();
        for($i = 0; $i < 2000; $i++)
        {
            Debug::create([
                'name' => $faker->name
            ]);
        }
        $sync->update(['status' => 'done']);
    }
}
