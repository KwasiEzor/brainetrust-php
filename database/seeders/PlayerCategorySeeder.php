<?php

namespace Database\Seeders;

use App\Models\PlayerCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PlayerCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jsonFile = File::get(public_path('data/player_categories.json'));
        $categoriesData = json_decode($jsonFile);

        foreach ($categoriesData->player_categories as $key => $category) {
            PlayerCategory::create([
                'name' => $category->name,
                'description' => $category->description
            ]);
        }
    }
}
