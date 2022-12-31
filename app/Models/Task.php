<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Task extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = ['task_category_id','title','note','date','priority','details','current_status'];

    public function task_category(){
        return $this->belongsTo(TaskCategory::class)->withDefault(['category_name' => '-']);
    }

}
