<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Schedule extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = ['schedule_category_id','title','note','date','priority','details','current_status'];

    public function schedule_category(){
        return $this->belongsTo(ScheduleCategory::class)->withDefault(['category_name' => '-']);
    }
}
