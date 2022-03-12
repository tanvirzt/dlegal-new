<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SetupExternalCouncilAssociate extends Model
{
    use HasFactory;

    public function external_council_associates_files()
    {
        return $this->hasMany(SetupExternalCouncilAssociatesFile::class, 'external_council_associates_id', 'id');
    }

}
