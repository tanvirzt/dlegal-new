<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CriminalCase extends Model
{
    use HasFactory;

    public function criminal_cases_files()
    {
        return $this->hasMany(CriminalCasesFile::class, 'case_id','id');
    }

}
