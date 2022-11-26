<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LedgerEntry extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'transaction_no', 
        'job_no', 
        'payment_against_bill',
        'bill_id', 
        'ledger_date', 
        'payment_type', 
        'ledger_head_bill_id', 
        'bill_amount', 
        'remarks',
    ];

    public function ledger_head_bill()
    {
        return $this->belongsTo(LedgerHead::class, 'ledger_head_bill_id');
    }

}
