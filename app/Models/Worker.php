<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'role',
        'daily_wage',
        'status',
    ];

    public function attendances()
    {
        return $this->hasMany(WorkerAttendance::class);
    }
}
