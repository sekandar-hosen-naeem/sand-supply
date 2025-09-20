<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tender extends Model
{
    use HasFactory;
    protected $fillable = [
        'river_point_id',
        'tender_no',
        'tender_rate_per_cft',
        'start_date',
        'end_date',
        'status',
    ];
    public function riverPoint()
    {
        return $this->belongsTo(RiverPoint::class);
    }
}
