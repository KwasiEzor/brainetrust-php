<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Faker\Factory as Faker;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $file = $faker->image();
        //
        Post::factory(50)->create()->each(function ($post) use ($file) {

            $tags = Tag::factory(20)->create();
            $post->tags()->attach(
                $tags->random(rand(2, 4))
            );
        });
    }
}
