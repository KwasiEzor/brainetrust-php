<?php

namespace Database\Seeders;

use App\Models\Club;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class ClubSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ///
        $jsonFile = File::get(public_path('data/clubs.json'));
        $clubsData = json_decode($jsonFile);

        foreach ($clubsData->clubs as $key => $club) {
            Club::create([
                'name' => $club->name,
                'locality' => $club->locality,
                'email' => $club->email,
                'address' => $club->address,
                'training_day' => $club->training_day,
                'training_time' => $club->training_time,
                'description' => $club->description,
                'contact_person' => $club->contact_person,
                'phone_number' => $club->phone_number,
                'mobile_number' => $club->mobile_number,
                'province' => $club->province,
                'lat' => $club->lat,
                'long' => $club->long

            ]);
        }
    }
}
