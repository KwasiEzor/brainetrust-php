<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Database\Seeders\ClubSeeder;
use Database\Seeders\PlayerSerieSeeder;
use Database\Seeders\PlayerCategorySeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(ClubSeeder::class);
        $this->call(PlayerSerieSeeder::class);
        $this->call(PlayerCategorySeeder::class);
    }
}
