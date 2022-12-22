<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CriminalCaseStatusLog extends Model
{
    use HasFactory;

    // public function case_status_name()
    // {
    //     return $this->hasOne(SetupCaseStatus::class);
    // }

    // public function case_status_name() {
    //     return $this->belongsTo('App\Models\SetupCaseStatus', 'updated_case_status_id');
    // }

    public function case()
    {
        return $this->belongsTo('App\Models\SetupCaseStatus','updated_case_status_id');
    }

    public function caseInfo()
    {
        return $this->belongsTo('App\Models\CriminalCase','case_id');
    }

    
}
