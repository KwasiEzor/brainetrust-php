<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\PlayerSerie;
use App\Models\PlayerCategory;
use Illuminate\Support\Carbon;
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
        $date = \Carbon\Carbon::createFromTimeStamp($this->faker->dateTimeBetween('now', '+365 days')->getTimestamp());

        $categoryIds = PlayerCategory::pluck('id')->all();
        $serieIds = PlayerSerie::pluck('id')->all();
        return [
            //
            'event_date' => $date,
            'competition' => $this->faker->words(rand(1, 5), true),
            'competition_round' => rand(1, 6),
            'minute_per_round' => rand(1, 4),
            'details' => $this->faker->sentences(rand(2, 5), true),
            'player_category_id' => $this->faker->randomElement($categoryIds),
            'player_serie_id' => $this->faker->randomElement($serieIds),
            'is_highlighted' => $this->faker->boolean()
        ];
    }
}
