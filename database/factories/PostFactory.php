<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {


        $title = $this->faker->sentence();
        $userIds = User::pluck('id')->all();
        $categryIds = Category::pluck('id')->all();

        return [

            'title' => $title,
            'slug' => Str::slug($title),
            'content' => $this->faker->paragraphs(rand(5, 10), true),
            // 'image_url' => $url,
            // 'image_url' => $this->faker->imageUrl(800, 600),
            'image_url' => 'https://picsum.photos/800/600?random=12965',
            // 'image_url' => $this->faker->image(storage_path('app/public/images')),
            'is_published' => $this->faker->boolean(85),
            'user_id' => $this->faker->randomElement($userIds),
            'category_id' => $this->faker->randomElement($categryIds)
        ];
    }
}
