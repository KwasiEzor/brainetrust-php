<?php

namespace Database\Factories;

use App\Models\Club;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Interclub>
 */
class InterclubFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $clubIds = Club::pluck('id')->all();
        return [
            //
            'receiver_team_id' => Club::inRandomOrder()->first()->id,
            'visitor_team_id' => $this->faker->randomElement($clubIds),
            'match_date' => $this->faker->dateTimeBetween('now', '+9 months'),
            'receiver_team_score' => number_format((rand(2000, 9000) / 100), 2),
            'visitor_team_score' => number_format((rand(2000, 9000) / 100), 2),
            'comments' => $this->faker->sentences(rand(6, 10), true),
            'match_report' => $this->faker->imageUrl()
        ];
    }
}
