<?php

namespace App\Exports;

use App\Models\ScGame;
use Maatwebsite\Excel\Concerns\FromCollection;

class ScGamesExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        //

        return ScGame::query()
            ->with('gm_rounds', 'gm_results')
            ->get();
    }
}
