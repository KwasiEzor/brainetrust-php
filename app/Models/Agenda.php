<?php

namespace App\Models;

use App\Models\PlayerSerie;
use App\Models\PlayerCategory;
use Carbon\Carbon;
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

    // public function setEventDateAttribute($value)
    // {
    //     return $this->attributes['event_date'] = Carbon::createFromFormat('Y/m/d H:i:s', $value)->format('d-m-Y H:i');
    // }
    // public function getEventDateAttribute()
    // {
    //     return Carbon::createFromFormat('d/m/Y H:i', $this->attributes['event_date']);
    // }
}
