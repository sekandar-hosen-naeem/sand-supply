<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicle_no',
        'type',
        'driver_name',
        'driver_phone',
        'capacity_cft',
        'status',
    ];

    public function trips()
    {
        return $this->hasMany(VehicleTrip::class);
    }
}
