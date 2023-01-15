<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pilotStat extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'pilot_id',
        'score',
        'kills',
        'deaths',
        'assists',
        'ai_kills',
        'cap_damage',
        'match_id',
        'match_won',
        'match_tied',
        'match_lost'
    ];
}
