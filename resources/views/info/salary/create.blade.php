@extends('common.layouts')

@section('content')

    {{--@include('common.validator')--}}
    @include('common.message')

    <!-- 自定义内容区域 -->
    <div class="panel panel-default">
        <div class="panel-heading">工资录入</div>
        <div class="panel-body">
            @include('info.salary.form')
        </div>
    </div>

@stop