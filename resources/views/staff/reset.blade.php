@extends('common.stafflayouts')

@section('content')

    {{--@include('common.validator')--}}

    @include('common.message')

    <!-- 自定义内容区域 -->
    <div class="panel panel-default" style="width: 1000px">
        <div class="panel-heading">修改密码</div>
        <div class="panel-body">
            <form class="form-horizontal" method="post" action="">

                {{ csrf_field() }}

                <div class="form-group">
                    <label for="password" class="col-sm-2 control-lable">旧密码</label>
                    <div class="col-sm-5">
                        <input type="password" name="Info[password]"
                               class="form-control" id="password" placeholder="请输入旧密码">
                    </div>
                    {{--<div class="col-sm-5">--}}
                    {{--<p class="form-control-static text-danger">{{ $errors->first('Info.age') }}</p>--}}
                    {{--</div>--}}
                </div>
                <div class="form-group">
                    <label for="newpassword" class="col-sm-2 control-lable">新密码</label>

                    <div class="col-sm-5">
                        <input type="password" name="Info[newpassword]"
                               class="form-control" id="newpassword" placeholder="请输入新密码">
                    </div>
                    {{--<div class="col-sm-5">--}}
                    {{--<p class="form-control-static text-danger">{{ $errors->first('Info.education_background') }}</p>--}}
                    {{--</div>--}}
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" style="width:100px;height:40px;">确认修改</button>
                        <a href="{{ url('api/staff/index') }}">
                            <button type="button" class="btn btn-primary" style="width:100px;height:40px;">返回</button>
                        </a>
                    </div>
                </div>

            </form>
        </div>
    </div>

@stop