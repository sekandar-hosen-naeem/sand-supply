<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenderOwner extends Model
{
    use HasFactory;

    protected $fillable = [
        'tender_id',
        'owner_name',
        'company_name',
        'phone',
        'address',
    ];

    public function tender()
    {
        return $this->belongsTo(Tender::class);
    }
}
