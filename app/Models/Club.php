<?php

namespace App\Models;

use App\Models\Interclub;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Club extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function receiver_team(): HasOne
    {
        return $this->hasOne(Interclub::class, 'receiver_team');
    }

    public function visitor_team(): HasOne
    {
        return $this->hasOne(Interclub::class, 'visitor_team');
    }
}
