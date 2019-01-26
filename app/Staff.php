<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    //定义性别常量
    const SEX_BOY = '男';     //男
    const SEX_GIRL = '女';    //女

    protected $primaryKey = 'id';

    // 职工信息类
    protected $table = 'staff_info';

    protected $fillable = [
        'department_id',
        'salary_id',
        'post_id',
        'name',
        'sex',
        'age',
        'education_background',
    ];

    // 与管理员类一对一
    public function root()
    {
        $this->hasOne('App\User','staff_id','id');
    }

    // 与用户类一对一
    public function user()
    {
        $this->hasOne('App\Users','staff_id','id');
    }

    // 与工资信息类一对一
    public function salary()
    {
        $this->hasOne('App\Salary','staff_id');
    }

    // 与部门类多对一
    public function department()
    {
        $this->belongsTo('App\Department','department_id');
    }

    // 与岗位类多对一
    public function post()
    {
        $this->belongsTo('App\Post','post_id');
    }

    // 与奖惩多对多
    public function reward()
    {
        $this->belongsToMany('App\Reward')->using('App\StaffReward');
    }

    // 与技能多对多
    public function skill()
    {
        $this->belongsToMany('App\Skill','staff_skill','staff_id','skill_id')->withPivot('time','site','level');
    }

    // 与课程多对多
    public function course()
    {
        $this->belongsToMany('App\Course','staff_crouse','staff_id','course_id')->withPivot('time','grade');
    }

    public function getDateFormat()
    {
        return date('Y-m-d H:i:m', time());
    }

    public  function asDateTime($value)
    {
        return $value;
    }

    public function fromDateTime($value)
    {
        return $value;
    }

    // 用于表单中性别的数据保持
    public function sex1($key = null )
    {
        $arr = [    //为常量赋值
            self::SEX_BOY => '男',
            self::SEX_GIRL => '女',
        ];

        if ($key !== null) {    //判断用户是否传参,有则根据传参的值返回对应的常量,没有则返回整个数组
            return array_key_exists($key, $arr) ? $arr[$key] : $arr[self::SEX_BOY];
        }

        return $arr;

    }

}
