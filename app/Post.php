<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // 岗位类
    protected $table = 'post_info';

    protected $fillable = [
        'name',
        'level',
        'created_at',
    ];

    // 与职工类一对多
    public function staff()
    {
        $this->hasMany('App\Staff','post_id','id');
    }

    // 与部门类多对多
    public function department()
    {
        $this->belongsToMany('App\Department','department_post','post_id','department_id')->withPivot('num');
    }

}
