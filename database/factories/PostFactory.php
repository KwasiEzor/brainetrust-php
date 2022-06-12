<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Str;
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
            'image_url' => $this->faker->imageUrl(),
            'is_published' => $this->faker->boolean(85),
            'user_id' => $this->faker->randomElement($userIds),
            'category_id' => $this->faker->randomElement($categryIds)
        ];
    }
}
