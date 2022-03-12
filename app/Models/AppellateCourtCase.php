<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppellateCourtCase extends Model
{
    use HasFactory;

    public function appellate_court_cases_files()
    {
        return $this->hasMany(AppellateCourtCasesFile::class, 'case_id', 'id');
    }

}
