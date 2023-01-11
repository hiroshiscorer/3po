<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class matchup extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'team1_id',
        'team2_id',
        'team1_score',
        'team2_score',
        'round',
        'division_id',
        'calendar',
        'bracket'
    ];
}


