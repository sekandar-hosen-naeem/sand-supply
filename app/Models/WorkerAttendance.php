<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkerAttendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'worker_id',
        'river_point_id',
        'attendance_date',
        'status',
        'remarks',
    ];

    public function worker()
    {
        return $this->belongsTo(Worker::class);
    }

    public function riverPoint()
    {
        return $this->belongsTo(RiverPoint::class);
    }
}
