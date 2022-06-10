<?php

namespace Database\Seeders;

use App\Models\PlayerSerie;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PlayerSerieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jsonFile = File::get(public_path('data/player_series.json'));
        $seriesData = json_decode($jsonFile);

        foreach ($seriesData->player_series as $key => $serie) {
            PlayerSerie::create([
                'name' => $serie->name,
                'description' => $serie->description
            ]);
        }
    }
}
