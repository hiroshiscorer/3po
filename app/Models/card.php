<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class card extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'season',
        'pilotname',
        'team',
        'team_image',
        'nr_k',
        'nr_d',
        'nr_a',
        'nr_w',
        'nr_kd',
        'nr_ai',
        'nr_cap',
        'ge_k',
        'ge_d',
        'ge_a',
        'ge_w',
        'ge_kd',
        'ge_ai',
        'ge_cap',
        't_kd',
    ];
}
