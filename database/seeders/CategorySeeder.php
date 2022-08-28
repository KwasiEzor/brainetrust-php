<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $categories = ['Championnats du monde', 'Compétitions', 'Scrabble Duplicate', 'Championnats de Belgique', 'Coupe de Belgique', 'Coupe du Club', 'Coupe d\'Europe', 'Entraînement de Scrabble', 'Formations', 'Histoire du Scrabble'];

        // Category::factory(10)->create();
        foreach ($categories as $category) {
            # code...
            Category::create([
                'name' => $category
            ]);
        }
    }
}
