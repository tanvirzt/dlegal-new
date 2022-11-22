<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'employee_name',
        'address',
        'nid_passport',
        'phone_number',
        'mobile_number',
        'fax',
        'email_address',
        'contact_person',
        'short_name',
        'credit_sale_limit',
        'employee_image',
        'created_by',
        'updated_by'
    ];


}
