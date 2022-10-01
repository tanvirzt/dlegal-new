<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InternalCounsel extends Model
{
    use HasFactory;

    public function documents_received()
    {
        return $this->hasMany(InternalCounselDocumentsReceived::class);
    }

    public function documents_required()
    {
        return $this->hasMany(InternalCounselDocumentsRequired::class);
    }

}
