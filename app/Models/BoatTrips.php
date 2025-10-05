<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoatTrip extends Model
{
    use HasFactory;

    protected $fillable = [
        'boat_id',
        'majhi_id',
        'river_point_id',
        'sale_point_id',
        'trip_date',
        'quantity_cft',
        'distance_km',
        'total_cost',
        'remarks',
    ];

    public function boat()
    {
        return $this->belongsTo(Boat::class);
    }

    public function majhi()
    {
        return $this->belongsTo(Majhi::class);
    }

    public function riverPoint()
    {
        return $this->belongsTo(RiverPoint::class);
    }

    public function salePoint()
    {
        return $this->belongsTo(SalePoint::class);
    }
}
