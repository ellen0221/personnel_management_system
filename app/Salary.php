<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    // 工资类
    protected $table = 'salary_info';

    protected $primaryKey = 'id';

    protected $fillable = [
        'staff_id',
        'basic',
        'level',
        'pension',
        'unemployment',
        'fund',
        'tax',
    ];

    // 与职工类一对一
    public function staff()
    {
        $this->belongsTo('App\Staff','staff_id');
    }

}
