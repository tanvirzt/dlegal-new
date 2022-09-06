<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DomainSetup extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['domain_name','company_id','company_logo','created_by','updated_by'];

    public function companies()
    {
        return $this->belongsTo(SetupCompany::class, 'company_id');
    }
}
