<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiverPoint extends Model
{
    use HasFactory;
    protected $fillable = [
        'point_name',
        'location',
        'gps_coordinates',
        'description',
    ];
    public function tenders()
    {
        return $this->hasMany(Tender::class);
    }
}
