@extends('common.layouts')

@section('content')

    @include('common.message')

    <!-- 自定义内容区域 -->
    <div class="panel panel-default" style="width: 1000px">
        <div class="panel-heading">培训课程列表</div>
        <form method="post">
            {{ csrf_field() }}
            <div class="col-lg-3 pull-right">
                <div class="input-group">
                    <input type="text" class="form-control" style="height: 35px" name="course[id]" placeholder="课程名/课程号">
                    <span class="input-group-btn">
                        <button class="btn btn-primary" type="submit" style="height: 35px">搜索</button>
                    </span>
                </div>
            </div>
        </form>
        <table class="table table-hover table-striped table-responsive">
            <thead>
            <tr>
                <th>课程号</th>
                <th>课程名</th>
                <th>教材</th>
                <th>学时</th>
                <th>选课人数</th>
                <th>添加时间</th>
                <th width="250">操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($info as $information)
                <tr>
                    <th scope="row">{{ $information->id }}</th>
                    <td>{{ $information->name }}</td>
                    <td>{{ $information->book }}</td>
                    <td>{{ $information->time }}</td>
                    <td>{{ $information->select_num }}</td>
                    <td>{{ $information->created_at }}</td>
                    <td>
                        <a href="{{ url('api/info/coursedetail', ['id' => $information->id]) }}">选课详情</a>&nbsp;
                        <a href="{{ url('api/info/coursegrade', ['id' => $information->id]) }}">成绩录入</a>&nbsp;
                        <a href="{{ url('api/info/updatecourse', ['id' => $information->id]) }}">修改</a>&nbsp;
                        <a href="{{ url('api/info/deletecourse', ['id' => $information->id]) }}"
                            onclick="if (confirm('确定删除吗?') == false) return false;">删除</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div align="center">
            <a href="{{ url('api/info/createcourse') }}">
                <button type="button" class="btn btn-primary" style="width:120px;height:40px;">新增培训课程</button>
            </a>
        </div>
    </div>

    <!-- 分页 -->
    {{--<div>--}}
        {{--<div class="pull-right">--}}
            {{--{{ $info->render() }}--}}
        {{--</div>--}}
    {{--</div>--}}

@stop
