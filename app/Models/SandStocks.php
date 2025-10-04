<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SandStock extends Model
{
    use HasFactory;

    protected $table = 'sand_stocks';

    protected $fillable = [
        'river_point_id',
        'sand_type_id',
        'available_quantity_cft',
    ];

    // Relationships
    public function riverPoint()
    {
        return $this->belongsTo(RiverPoint::class, 'river_point_id');
    }

    public function sandType()
    {
        return $this->belongsTo(SandType::class, 'sand_type_id');
    }
}
