<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boat extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'registration_no',
        'capacity_cft',
        'status',
    ];

    public function majhis()
    {
        return $this->hasMany(Majhi::class);
    }
}
