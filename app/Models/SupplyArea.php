<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplyArea extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'river_point_id',
        'cost_per_cft',
    ];

    public function riverPoint()
    {
        return $this->belongsTo(RiverPoint::class);
    }
}
