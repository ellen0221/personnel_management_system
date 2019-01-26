@extends('common.stafflayouts')

@section('content')

    @include('common.message')

    <!-- 自定义内容区域 -->
    <div class="panel panel-default" style="width: 1000px">
        <div class="panel-heading">选课</div>
        <table class="table table-hover table-striped table-responsive">
            <thead>
            <tr>
                <th>课程号</th>
                <th>课程名</th>
                <th>教材</th>
                <th>学时</th>
                <th>添加时间</th>
                <th width="150">操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($info as $information)
                <tr>
                    <th scope="row">{{ $information->id }}</th>
                    <td>{{ $information->name }}</td>
                    <td>{{ $information->book }}</td>
                    <td>{{ $information->time }}</td>
                    <td>{{ $information->created_at }}</td>
                    <td>
                        <a href="{{ url('api/staff/selected', ['id' => $information->id]) }}">选课</a>&nbsp;
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <!-- 分页 -->
    <div>
        <div class="pull-right">
            {{ $info->render() }}
        </div>
    </div>

@stop
