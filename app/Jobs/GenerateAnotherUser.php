<?php

namespace App\Jobs;

use App\Models\Debug;
use Faker\Factory as Faker;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class GenerateAnotherUser implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $faker = Faker::create();
        for($i = 0; $i < 5000; $i++)
        Debug::create([
            'name' => $faker->name
        ]);
    }
}
