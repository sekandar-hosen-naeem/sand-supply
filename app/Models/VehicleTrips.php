<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleTrip extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicle_id',
        'driver_name',
        'trip_date',
        'source_point_id',
        'destination_point_id',
        'quantity_cft',
        'rate_per_cft',
        'total_amount',
        'remarks',
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id');
    }

    public function sourcePoint()
    {
        return $this->belongsTo(SalePoint::class, 'source_point_id');
    }

    public function destinationPoint()
    {
        return $this->belongsTo(Buyer::class, 'destination_point_id');
    }
}
