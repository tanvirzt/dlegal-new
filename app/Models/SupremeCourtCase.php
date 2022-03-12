<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupremeCourtCase extends Model
{
    use HasFactory;

    public function supreme_court_cases_files()
    {
        return $this->hasMany(SupremeCourtCasesFile::class, 'case_id', 'id');
    }

}
