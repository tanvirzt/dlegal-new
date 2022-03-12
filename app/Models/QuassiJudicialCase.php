<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuassiJudicialCase extends Model
{
    use HasFactory;

    public function quassi_judicial_cases_files()
    {
        return $this->hasMany(QuassiJudicialCasesFile::class, 'case_id', 'id');
    }


}
