<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LedgerCategory extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'ledger_category_name',
    ];
}
