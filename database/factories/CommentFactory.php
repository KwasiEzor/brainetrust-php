<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $postIds = Post::pluck('id')->all();
        $userIds = User::pluck('id')->all();
        return [
            //
            'post_id' => $this->faker->randomElement($postIds),
            'user_id' => $this->faker->randomElement($userIds),
            'content' => $this->faker->sentences(rand(2, 5), true)
        ];
    }
}
