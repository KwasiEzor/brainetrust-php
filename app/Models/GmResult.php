<?php

namespace App\Models;

use App\Models\ScGame;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GmResult extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function sc_game(): BelongsTo
    {
        return $this->belongsTo(ScGame::class);
    }
}
