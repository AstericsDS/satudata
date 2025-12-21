<?php

namespace Database\Seeders;

use App\Models\Data;
use App\Models\Fakultas;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // $this->call([
        //     DataSeeder::class,
        //     FakultasSeeder::class,
        //     ProdiSeeder::class
        // ]);

        // User::create([
        //     'name' => 'Andhika',
        //     'email' => 'andhika.dwiputra.soetjiadi@mhs.unj.ac.id'
        // ]);

        DB::table('users')->insert([
            [
                'name' => 'Andhika',
                'email' => 'andhika.dwiputra.soetjiadi@mhs.unj.ac.id'
            ],
            [
                'name' => 'Chelsea',
                'email' => 'chelsea.vanianindya.putri@mhs.unj.ac.id'
            ]
        ]);
    }
}