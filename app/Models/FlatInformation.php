<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlatInformation extends Model
{
    use HasFactory;

    public function flat_information_files()
    {
        return $this->hasMany(FlatInformationFile::class, 'flat_information_id', 'id');
    }

}
