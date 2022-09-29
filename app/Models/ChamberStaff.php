<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class ChamberStaff extends Model
{
    use HasFactory, SoftDeletes;

    public function documents_received()
    {
        return $this->hasMany(ChamberStaffDocumentsReceived::class);
    }

    public function documents_required()
    {
        return $this->hasMany(ChamberStaffDocumentsRequired::class);
    }

}
