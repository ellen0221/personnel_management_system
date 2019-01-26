<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reward extends Model
{
    //定义奖惩常量
    const REWARD = 10;     //奖励
    const PUNISH = 20;    //惩罚

    // 奖惩类
    protected $table = 'reward_info';

    protected $fillable = [
        'staff_id',
        'type1',
        'project',
        'sum1',
    ];

    // 与职工类多对多
    public function staff()
    {
        $this->belongsToMany('App\Staff','staff_reward','reward_id','staff_id')->withPivot('time');
    }

    // 用于表单中奖惩类型的数据保持
    public function type2($key = null )
    {
        $arr = [    //为常量赋值
            self::REWARD => '奖励',
            self::PUNISH => '惩罚',
        ];

        if ($key !== null) {    //判断用户是否传参,有则根据传参的值返回对应的常量,没有则默认为奖励
            return array_key_exists($key, $arr) ? $arr[$key] : $arr[self::REWARD];
        }

        return $arr;

    }
}
