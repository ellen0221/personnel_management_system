<?php

namespace App\Http\Controllers;

use Gregwar\Captcha\CaptchaBuilder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CodeController extends Controller
{
    //
    public function captcha($tmp)
    {
        $builder = new CaptchaBuilder();
        $builder->build(150,32);

        // 获取验证码内容
        $phrase = $builder->getPhrase();

        // 把内容存入session
        Session::flash('milkcaptcha', $phrase);
        // 清楚缓存
        ob_clean();

        return response($builder->output())->header('Content-type', 'image/jpeg');
    }
}
