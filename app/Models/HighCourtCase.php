<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HighCourtCase extends Model
{
    use HasFactory;

    public function high_court_cases_files()
    {
        return $this->hasMany(HighCourtCasesFile::class, 'case_id', 'id');
    }

}
