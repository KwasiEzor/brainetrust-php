<?php

namespace Database\Seeders;

use App\Models\ScrabbleType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ScrabbleTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $jsonFile = File::get(public_path('data/scrabble_types.json'));

        $scrabbleTypes = json_decode($jsonFile);

        foreach ($scrabbleTypes->data as $type) {

            ScrabbleType::create([
                'sc_type' => $type->sc_type,
                'name' => $type->name,
                'description' => $type->description
            ]);
        }
    }
}
