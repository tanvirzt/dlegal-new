<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LedgerHead extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'ledger_head_name',
        'ledger_code',
        'ledger_category_id',
    ];

    public function ledger_category(){
        return $this->belongsTo(LedgerCategory::class);
    }


}
