<?php

namespace Database\Seeders;

use App\Models\PlayScrabble;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PlayScrabbleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $jsonFile = File::get(public_path('data/scrabble_rules.json'));

        $scrabbleRules = json_decode($jsonFile);

        foreach ($scrabbleRules->data as $rule) {

            PlayScrabble::create([
                'title' => $rule->title,
                'description' => $rule->description,
                'rule' => $rule->rule,
            ]);
        }
    }
}
