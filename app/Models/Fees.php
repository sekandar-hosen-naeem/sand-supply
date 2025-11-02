<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fees extends Model
{
    use HasFactory;

    protected $table = 'fees';

    protected $fillable = [
        'member_id',
        'fees_month',
        'fees_year',
        'pay_date',
        'pay_status',
        'amount'
    ];

    public $timestamps = false;

}
