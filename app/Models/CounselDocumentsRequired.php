<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CounselDocumentsRequired extends Model
{
    use HasFactory;

    public function required_wanting_documents_name()
    {
        return $this->belongsTo(SetupDocument::class, 'required_wanting_documents_id');
    }

    public function required_wanting_documents_type_name()
    {
        return $this->belongsTo(SetupDocumentsType::class, 'required_wanting_documents_type_id');
    }

}
