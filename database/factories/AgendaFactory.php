<?php

namespace Database\Factories;

use App\Models\PlayerCategory;
use App\Models\PlayerSerie;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Agenda>
 */
class AgendaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $date = $this->faker->unique()->dateBetween('now', '+270 days');
        $hour = $this->faker->numberBetween(7, 20);
        $minutes = $this->faker->numberBetween(0, 60);
        return [
            //
            'event_date' => $date,
            'event_time' => $hour . 'H' . $minutes,
            'competiion' => $this->faker->words(rand(1, 5), true),
            'competion_round' => $this->faker->rand(1, 6),
            'minute_per_round' => $this->faker->rand(1, 4),
            'details' => $this->faker->sentences(rand(2, 5), true),
            'player_category_id' => PlayerCategory::all()->random(),
            'player_serie_id' => PlayerSerie::all()->random(),
            'is_highlighted' => $this->faker->boolean()
        ];
    }
}
