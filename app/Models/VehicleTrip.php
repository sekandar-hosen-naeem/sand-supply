<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleTrip extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicle_id',
        'river_point_id',
        'sale_point_id',
        'transport_rate_id',
        'trip_date',
        'distance_km',
        'quantity_cft',
        'total_cost',
        'remarks',
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function riverPoint()
    {
        return $this->belongsTo(RiverPoint::class);
    }

    public function salePoint()
    {
        return $this->belongsTo(SalePoint::class);
    }

    public function transportRate()
    {
        return $this->belongsTo(TransportRate::class);
    }
}
