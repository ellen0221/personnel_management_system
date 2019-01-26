<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StaffCourse extends Model
{
    //职工选课-中间表
    protected $table = 'staff_course';

    protected $fillable = [
        'staff_id',
        'course_id',
        'grade',
    ];


}
