<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FuelConsumption extends Model
{
    use HasFactory;

    protected $fillable = [
        'equipment_id',
        'vehicle_id',
        'boat_id',
        'consumption_date',
        'fuel_quantity_liters',
        'unit_price',
        'total_cost',
        'remarks',
    ];

    public function equipment()
    {
        return $this->belongsTo(Equipment::class);
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function boat()
    {
        return $this->belongsTo(Boat::class);
    }
}
