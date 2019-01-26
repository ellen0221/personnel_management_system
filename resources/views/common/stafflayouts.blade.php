<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>人事信息管理系统 - @yield('title')</title>
    <link href="{{ asset('static/css/bootstrap.min.css') }}" rel="stylesheet">
    @section('style')
    @show
</head>
<body>

<!-- 头部 -->
@section('header')
    {{--<a href="{{ url('api/staff/reset') }}" cclass="btn btn-primary">重置密码</a>--}}
    <form method="post" action="{{'/stafflogout'}}">
        {{ csrf_field() }}
        <div class="col-lg-3 pull-right">
                    <button class="btn btn-primary" type="submit" style="height: 35px">退出登录</button>
        </div>
    </form>
    <a class="btn btn-primary pull-right" style="height: 35px" href="{{ url('staffreset') }}">重置密码</a>
    <div class="jumbotron">
        <div class="container">
            <h1>人事信息管理系统</h1>
        </div>
    </div>
@show

<!-- 中间内容区域 -->
<div class="container">
    <div class="row">

        <!-- 左侧菜单区域 -->
        <div class="col-md-3">
            {{--@yield('leftmenu')--}}
            @section('leftmenu')
                <div class="list-group">
                    <a href="{{ url('api/staff/reward') }}" class="list-group-item
                            ">奖惩记录</a>
                    <a href="{{ url('api/staff/showcourse') }}" class="list-group-item
                            ">选课</a>
                    <a href="{{ url('api/staff/record') }}" class="list-group-item
                            ">选课记录</a>
                    <a href="{{ url('api/staff/salary') }}" class="list-group-item
                    ">工资</a>
                </div>
            @show
        </div>


        <!-- 右侧内容区域 -->
        <div class="col-md-9">


            @yield('content')


        </div>
    </div>
</div>

<!-- 尾部 -->
@section('footet')
    <div class="jumbotron" style="margin: 0;">
        <div class="container">
            <span> @2019 xj</span>
        </div>
    </div>
@show

<!-- jQuery 文件 -->
<script src="{{ asset('static/js/jquery.min.js') }}"></script>
<!-- Bootstrap JavaScript 文件 -->
<script src="{{ asset('static/js/bootstrap.min.js') }}"></script>

@section('js')

@show

</body>
</html>
