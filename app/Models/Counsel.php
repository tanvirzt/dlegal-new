<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Counsel extends Model
{
    use HasFactory, SoftDeletes;

    public function documents_received()
    {
        return $this->hasMany(CounselDocumentsReceived::class);
    }

    public function documents_required()
    {
        return $this->hasMany(CounselDocumentsRequired::class);
    }

}
