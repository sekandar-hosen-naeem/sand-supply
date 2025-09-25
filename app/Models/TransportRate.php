<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransportRate extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicle_type',
        'capacity_cft',
        'rate_per_trip',
    ];
}

