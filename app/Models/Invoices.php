<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'buyer_id',
        'tender_owner_id',
        'sand_type_id',
        'invoice_date',
        'invoice_number',
        'quantity_cft',
        'rate_per_cft',
        'total_amount',
        'payment_status',
        'remarks',
    ];

    public function buyer()
    {
        return $this->belongsTo(Buyer::class);
    }

    public function tenderOwner()
    {
        return $this->belongsTo(TenderOwner::class);
    }

    public function sandType()
    {
        return $this->belongsTo(SandType::class);
    }
}
