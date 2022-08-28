<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jsonFile = File::get(public_path('data/blog_posts.json'));
        $postsData = json_decode($jsonFile);
        //

        foreach ($postsData->posts as $key => $post) {
            # code...
            $title = $post->title;
            Post::create([
                'title' => $title,
                'slug' => Str::slug($title),
                'content' => $post->content,
                'image_url' => $post->image_url,
                'category_id' => rand(1, 8),
                'user_id' => 1,
                'is_published' => rand(0, 1),
                'source' => $post->source,

            ])->each(function ($item) {
                $tags = Tag::all();
                $item->tags()->attach(
                    $tags->random(rand(1, 2))
                );
            });
        }
        // Post::factory(50)->create()->each(function ($post) {
        //     $tags = Tag::all();

        //     $post->tags()->attach(
        //         $tags->random(rand(2, 4))
        //     );
        // });
    }
}
