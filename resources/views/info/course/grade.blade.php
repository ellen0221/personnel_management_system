@extends('common.layouts')

@section('content')

    {{--@include('common.validator')--}}

    <!-- 自定义内容区域 -->
    <div class="panel panel-default">
        <div class="panel-heading">{{ $info->name }}-成绩录入</div>
        <div class="panel-body">
            <form class="form-horizontal" method="post" action="">

                {{ csrf_field() }}

                <div class="form-group">
                    <label for="id" class="col-sm-2 control-lable">职工号</label>

                    <div class="col-sm-5">
                        <input type="text" name="Info[id]"
                               value="{{ old('Info')['id'] ? old('Info')['id'] : $info->id }}"
                               class="form-control" id="id" placeholder="请输入职工号">
                    </div>
                    {{--<div class="col-sm-5">--}}
                    {{--<p class="form-control-static text-danger">{{ $errors->first('Info.name') }}</p>--}}
                    {{--</div>--}}
                </div>
                <div class="form-group">
                    <label for="grade" class="col-sm-2 control-lable">成绩</label>
                    <div class="col-sm-5">
                        <input type="text" name="Info[grade]"
                               value="{{ old('Info')['grade'] ? old('Info')['grade'] : $info->grade }}"
                               class="form-control" id="grade" placeholder="请输入成绩">
                    </div>
                    {{--<div class="col-sm-5">--}}
                    {{--<p class="form-control-static text-danger">{{ $errors->first('Info.age') }}</p>--}}
                    {{--</div>--}}
                </div>


                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" style="width:100px;height:40px;">提交</button>
                        <a href="{{ url('api/info/courseindex') }}">
                            <button type="button" class="btn btn-primary" style="width:100px;height:40px;">返回</button>
                        </a>
                    </div>
                </div>

            </form>
        </div>
    </div>

@stop