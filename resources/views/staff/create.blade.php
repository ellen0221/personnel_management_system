@extends('common.stafflayouts')

@section('content')

    {{--@include('common.validator')--}}
    @include('common.message')

    <!-- 自定义内容区域 -->
    <div class="panel panel-default" style="width: 1000px">
        <div class="panel-heading">选课</div>
        <div class="panel-body">
            @include('staff.form')
            {{--@include('info.staff.testform')--}}
        </div>
    </div>

@stop