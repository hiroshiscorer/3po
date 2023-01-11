<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pilot extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'pilot_name',
        'team_id',
        'misc'
    ];
}
