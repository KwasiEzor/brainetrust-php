<?php

namespace App\Models;

use App\Models\User;
use App\Models\GmRound;
use App\Models\GmResult;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ScGame extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function gm_rounds(): HasMany
    {
        return $this->hasMany(GmRound::class);
    }

    public function gm_results(): HasMany
    {
        return $this->hasMany(GmResult::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
