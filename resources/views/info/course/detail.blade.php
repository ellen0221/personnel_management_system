@extends('common.layouts')

@section('content')
    <!-- 自定义内容区域 -->
    <div class="panel panel-default">
        <div class="panel-heading">选课详情</div>

        <table class="table table-bordered table-striped table-hover">
            <thead>
            <tr>
                <th>课程名</th>
                <th>职工号</th>
                <th>职工姓名</th>
                <th>成绩</th>
            </tr>
            </thead>
            <tbody>
            @foreach($info as $infomation)
            <tr>
                <td scope="row">{{ $name }}</td>
                <td>{{ $infomation->id }}</td>
                <td>{{ $infomation->name }}</td>
                <td>{{ $infomation->grade }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <div align="center">
            <br>
            <a href="{{ url('api/info/courseindex') }}">
                <button type="button"  style="width:100px;height:40px;">返回</button>
            </a>
        </div>
    </div>

@stop
