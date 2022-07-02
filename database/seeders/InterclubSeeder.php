<?php

namespace Database\Seeders;

use App\Models\Interclub;
use Illuminate\Database\Seeder;
use Database\Factories\InterclubFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class InterclubSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        Interclub::factory(20)->create();
        Interclub::factory(20)->create([
            'match_round' => 2
        ]);
    }
}
