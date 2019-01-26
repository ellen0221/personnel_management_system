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
    <form method="post" action="{{'/logout'}}">
        {{ csrf_field() }}
        <div class="col-lg-3 pull-right">
            <div class="input-group">
                <span class="input-group-btn">
                        <button class="btn btn-primary" type="submit" style="height: 35px">退出登录</button>
                    </span>
            </div>
        </div>
    </form>
    <a class="btn btn-primary pull-right" style="height: 35px" href="{{ url('reset') }}">重置密码</a>
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
            @section('leftmenu')
                <div class="list-group">
                    <a href="{{ url('api/info/index') }}" class="list-group-item
                        {{ app('request')->getPathInfo() == '/api/info/index' ? 'active' : '' }}
                    ">职工列表</a>
                    <a href="{{ url('api/info/departmentindex') }}" class="list-group-item
                        {{ app('request')->getPathInfo() == '/api/info/departmentindex' ? 'active' : '' }}
                    ">部门列表</a>
                    <a href="{{ url('api/info/postindex') }}" class="list-group-item
                        {{ app('request')->getPathInfo() == '/api/info/postindex' ? 'active' : '' }}
                            ">岗位列表</a>
                    <a href="{{ url('api/info/courseindex') }}" class="list-group-item
                        {{ app('request')->getPathInfo() == '/api/info/courseindex' ? 'active' : '' }}
                    ">培训课程列表</a>
                    <a href="{{ url('api/info/rewardindex') }}" class="list-group-item
                        {{ app('request')->getPathInfo() == '/api/info/rewardindex' ? 'active' : '' }}
                    ">奖惩列表</a>
                    <a href="{{ url('api/info/salaryindex') }}" class="list-group-item
                        {{ app('request')->getPathInfo() == '/api/info/salaryindex' ? 'active' : '' }}
                            ">工资列表</a>
                    <a href="{{ url('api/info/admin') }}" class="list-group-item
                        {{ app('request')->getPathInfo() == '/api/info/admin' ? 'active' : '' }}
                            ">管理员列表</a>
                    {{--<a href="{{ url('api/info/all') }}" class="list-group-item--}}
                        {{--{{ app('request')->getPathInfo() == '/api/info/all' ? 'active' : '' }}--}}
                            {{--">数据统计</a>--}}
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
