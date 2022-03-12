<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CivilCases extends Model
{
    use HasFactory;

    public function civil_cases_files()
    {
        return $this->hasMany(CivilCasesFile::class,'case_id','id');
    }

}
