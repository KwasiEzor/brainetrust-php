<?php

namespace App\Models;

use App\Models\Club;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Interclub extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function receiver_team(): BelongsTo
    {
        return $this->belongsTo(Club::class, 'receiver_team_id');
    }

    public function visitor_team(): BelongsTo
    {
        return $this->belongsTo(Club::class, 'visitor_team_id');
    }
}
