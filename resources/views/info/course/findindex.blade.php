@extends('common.layouts')

@section('content')

    @include('common.message')

    <!-- 自定义内容区域 -->
    <div class="panel panel-default" style="width: 1000px">
        <div class="panel-heading">搜索结果</div>
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
                        <a href="{{ url('api/info/coursedetail', ['id' => $information->id]) }}">选课详情</a>&nbsp;
                        <a href="{{ url('api/info/updatecourse', ['id' => $information->id]) }}">修改</a>&nbsp;
                        <a href="{{ url('api/info/deletecourse', ['id' => $information->id]) }}"
                            onclick="if (confirm('确定删除吗?') == false) return false;">删除</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div align="center">
            <a href="{{ url('api/info/courseindex') }}">
                <button type="button" class="btn btn-primary" style="width:120px;height:40px;">返回</button>
            </a>
        </div>
    </div>

@stop
