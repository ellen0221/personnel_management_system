@extends('common.stafflayouts')

@section('content')

    @include('common.message')

    <!-- 自定义内容区域 -->
    <div class="panel panel-default" style="width: 1000px">
        <div class="panel-heading">选课记录</div>
        <table class="table table-hover table-striped table-responsive">
            <thead>
            <tr>
                <th>课程号</th>
                <th>课程名</th>
                <th>学时</th>
                <th>选课时间</th>
                <th>成绩</th>
            </tr>
            </thead>
            <tbody>
            @foreach($info as $information)
                <tr>
                    <th scope="row">{{ $information->id }}</th>
                    <td>{{ $information->name }}</td>
                    <td>{{ $information->time }}</td>
                    <td>{{ $information->created_at }}</td>
                    <td>{{ $information->grade }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@stop
