<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Majhi extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'boat_name',
        'daily_wage',
        'status',
    ];
}
