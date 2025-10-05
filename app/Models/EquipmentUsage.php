<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipmentUsage extends Model
{
    use HasFactory;

    protected $fillable = [
        'equipment_id',
        'operator_id',
        'river_point_id',
        'usage_date',
        'hours_used',
        'fuel_used_liters',
        'cost',
        'remarks',
    ];

    public function equipment()
    {
        return $this->belongsTo(Equipment::class);
    }

    public function operator()
    {
        return $this->belongsTo(Operator::class);
    }

    public function riverPoint()
    {
        return $this->belongsTo(RiverPoint::class);
    }
}
