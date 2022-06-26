<?php

namespace Database\Seeders;

use App\Models\GmResult;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GmResultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jsonFile = File::get(public_path('data/game_results.json'));
        $gmResultsData = json_decode($jsonFile);

        foreach ($gmResultsData->data as $key => $item) {
            foreach ($item->results as $key => $result) {
                GmResult::create([
                    'ranking_position' => $result->ranking_position,
                    'player_top' => $result->player_top,
                    'game_top' => $result->game_top,
                    'percentage' => $result->percentage,
                    'sc_game_id' => $result->sc_game_id,
                    'user_id' => User::inRandomOrder()->first()->id
                ]);
            }
        }
    }
}
