<?php

namespace Database\Seeders;

use App\Models\AboutClub;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class AboutClubSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $jsonFile = File::get(public_path('data/about_data.json'));
        $aboutData = json_decode($jsonFile);

        foreach ($aboutData->data as $about) {

            AboutClub::create([
                'title' => $about->title,
                'content' => $about->content,
            ]);
        }
    }
}
