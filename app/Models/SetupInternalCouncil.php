<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SetupInternalCouncil extends Model
{
    use HasFactory;

    public function internal_council_files()
    {
        return $this->hasMany(SetupInternalCouncilFiles::class, 'internal_council_id', 'id');
    }

}
