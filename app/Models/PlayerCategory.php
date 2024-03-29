<?php

namespace App\Models;

use App\Models\Agenda;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PlayerCategory extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function agendas()
    {
        return $this->hasMany(Agenda::class);
    }
}
