<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ScGame>
 */
class ScGameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'game_referee' => User::inRandomOrder()->first(),
            'competition_date' => $this->faker->dateTimeBetween('now', '+9 months'),
            'report_sheet' => $this->faker->imageUrl(),
            'comments' => $this->faker->sentence()
        ];
    }
}
