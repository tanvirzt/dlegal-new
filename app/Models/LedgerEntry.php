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
        'ledger_type', 
        'payment_against_bill',
        'bill_id', 
        'ledger_date', 
        'paid_amount', 
        'payment_type', 
        'ledger_head_bill_id', 
        'income_paid_amount',
        'expense_paid_amount',
        'bill_amount', 
        'remarks',
    ];

    public function ledger_head_bill()
    {
        return $this->belongsTo(LedgerHead::class, 'ledger_head_bill_id');
    }
    public function bill()
    {
        return $this->belongsTo(CaseBilling::class);
    }

}
