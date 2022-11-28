<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CriminalCasesCaseFileLocation extends Model
{
    use HasFactory;
    public function cabinate()
    {
        return $this->belongsTo('App\Models\SetupCabinet','case_file_location_new_id');
    }
}
