<?php

namespace App\Models;

use App\Models\PlayerSerie;
use App\Models\PlayerCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Agenda extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function player_category()
    {
        return $this->belongsTo(PlayerCategory::class);
    }

    public function player_serie()
    {
        return $this->belongsTo(PlayerSerie::class);
    }
}
