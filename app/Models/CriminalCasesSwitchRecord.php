<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CriminalCasesSwitchRecord extends Model
{
    use HasFactory;

    public function case_details()
    {
        return $this->belongsTo(CriminalCase::class,'case_id');
    }

}
