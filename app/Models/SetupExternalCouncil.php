<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SetupExternalCouncil extends Model
{
    use HasFactory;

    public function title()
    {
        return $this->belongsTo('App\Models\SetupPersonTitle','title_id')->select('id','setup_person_name');
    }

}
