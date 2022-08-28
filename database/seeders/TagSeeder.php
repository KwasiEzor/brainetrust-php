<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ['Scrabble francophone', 'Duplicate', 'Classique', 'Championnats de Belgique', 'Règles du jeu', 'Championnats du Monde', 'Apprendre à jouer', 'Gagner au Scrabble', 'Histoire du scrabble', 'Défi mondial', 'Interclubs', 'Sport intellectuel'];
        //

        foreach ($tags as $tag) {
            # code...
            Tag::create([
                'name' => $tag
            ]);
        }
    }
}
