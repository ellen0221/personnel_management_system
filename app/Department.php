<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    // 部门信息类
    protected $table = 'department_info';

    protected $fillable = [
        'name',
        'function',
    ];

    // 与职工类一对多
    public function staff()
    {
        $this->hasMany('App\Staff','department_id','id');
    }

    // 与岗位类多对多
    public function post()
    {
        $this->belongsToMany('App\Post','department_post','department_id','post_id')->withPivot('num');  // 指定中间表DepartmentPost
    }

}
