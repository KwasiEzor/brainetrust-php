<?php

namespace Database\Seeders;

use App\Models\GmRound;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GmRoundSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $jsonFile = File::get(public_path('data/game_rounds.json'));
        $gmRoundsData = json_decode($jsonFile);

        foreach ($gmRoundsData->data as $key => $item) {
            foreach ($item->game as $key => $game) {
                GmRound::create([
                    'letters_selected' => $game->letters_selected,
                    'place' => $game->place,
                    'solution' => $game->solution,
                    'top_points' => $game->top_points,
                    'comments' => $game->comments,
                    'sc_game_id' => $game->sc_game_id
                ]);
            }
        }
    }
}
