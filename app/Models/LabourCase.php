<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabourCase extends Model
{
    use HasFactory;

    public function labour_cases_files()
    {
        return $this->hasMany(LabourCasesFile::class,'case_id','id');
    }

}
