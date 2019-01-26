<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DepartmentPost extends Model
{
    //
    protected $table = 'department_post';

    protected $fillable = [
        'department_id',
        'post_id',
        'num',
    ];


}
