<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class match extends Model
{
    use HasFactory;
    protected $fillable =  [
        'id',
        'match_round',
        'matchup_id',
        'game',
        'map',
        'faction'
    ];
}
