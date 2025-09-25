<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SandType extends Model
{
    use HasFactory;

    protected $fillable = [
        'sand_name',
        'quality_grade',
        'price_per_cft',
    ];

    public function sandStocks()
    {
        return $this->hasMany(SandStock::class);
    }
}
