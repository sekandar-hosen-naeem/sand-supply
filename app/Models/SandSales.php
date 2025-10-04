<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SandSale extends Model
{
    use HasFactory;

    protected $table = 'sand_sales';

    protected $fillable = [
        'sale_date',
        'buyer_id',
        'sand_type_id',
        'quantity_cft',
        'rate_per_cft',
        'total_amount',
        'payment_status',
    ];

    protected $casts = [
        'sale_date' => 'date',
        'quantity_cft' => 'float',
        'rate_per_cft' => 'float',
        'total_amount' => 'float',
    ];

    // Relations
    public function buyer()
    {
        return $this->belongsTo(Buyer::class, 'buyer_id');
    }

    public function sandType()
    {
        return $this->belongsTo(SandType::class, 'sand_type_id');
    }
}
