<?php

namespace Database\Seeders;

use App\Models\Agenda;
use App\Models\PlayerCategory;
use App\Models\PlayerSerie;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AgendaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $jsonFile = File::get(public_path('data/agendas.json'));
        $agendasData = json_decode($jsonFile);
        // Carbon::setLocale('fr');
        $year = 2022;
        $month = 9;
        $day = 7;
        $hour = 20;
        $minute = 0;
        $second = 0;
        $date = Carbon::create($year, $month, $day, $hour, $minute, $second, 'Europe/Brussels');
        foreach ($agendasData->data as $key => $agenda) {
            Agenda::create([
                'event_date' => $date->add(7, 'days'),
                'competition' => $agenda->competition,
                'competition_round' => $agenda->competition_round,
                'minute_per_round' => $agenda->minute_per_round,
                'details' => $agenda->details,
                'player_category_id' => PlayerCategory::inRandomOrder()->first()->id,
                'player_serie_id' => PlayerSerie::inRandomOrder()->first()->id,
                'is_highlighted' => 5 > 10 ? false : true
            ]);
        }
        // Agenda::factory(100)->create();
    }
}
