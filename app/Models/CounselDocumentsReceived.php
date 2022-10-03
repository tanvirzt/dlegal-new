<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CounselDocumentsReceived extends Model
{
    use HasFactory;

    public function received_documents_name()
    {
        return $this->belongsTo(SetupDocument::class, 'received_documents_id');
    }

    public function received_documents_type_name()
    {
        return $this->belongsTo(SetupDocumentsType::class, 'received_documents_type_id');
    }
}
