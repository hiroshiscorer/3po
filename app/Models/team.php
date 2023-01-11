<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class team extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'team_name',
        'initials',
        'logo',
        'club',
        'division_id',
        'penalty',
        'misc'
    ];
}
