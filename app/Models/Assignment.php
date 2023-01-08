<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Assignment extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = ['assignment_category_id','title','note','date','details','current_status','service_type','service_id','assign_id'];

    public function assignment_category(){
        return $this->belongsTo(AssignmentCategory::class)->withDefault(['category_name' => '-']);
    }
}
