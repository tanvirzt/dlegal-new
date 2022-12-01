<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseBilling extends Model
{
    use HasFactory;

    public function ledger(){
        return $this->hasMany(LedgerEntry::class, 'bill_id');
    }

}
