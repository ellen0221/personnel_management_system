<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    // 课程类
    protected $table='course_info';

    protected $fillable = [
        'name', 'book', 'time'
    ];

    // 与职工类多对多
    public function staff()
    {
        $this->belongsToMany('App\Staff','staff_course','course_id','staff_id')->withPivot('time','grade');
    }

}
