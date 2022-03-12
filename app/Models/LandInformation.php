<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandInformation extends Model
{
    use HasFactory;

    public function land_information_files()
    {
        return $this->hasMany(LandInformationFile::class, 'land_information_id', 'id');
    }

}
