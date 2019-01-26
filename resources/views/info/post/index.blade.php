@extends('common.layouts')

@section('content')

    @include('common.message')

    <!-- 自定义内容区域 -->
    <div class="panel panel-default" style="width: 1000px">
        <div class="panel-heading">岗位列表</div>
        <form method="post">
            {{ csrf_field() }}
            <div class="col-lg-3 pull-right">
                <div class="input-group">
                    <input type="text" class="form-control" style="height: 35px" name="post[id]" placeholder="岗位名/岗位号">
                    <span class="input-group-btn">
                        <button class="btn btn-primary" type="submit" style="height: 35px">搜索</button>
                    </span>
                </div>
            </div>
        </form>
        <table class="table table-hover table-striped table-responsive">
            <thead>
            <tr>
                <th>岗位号</th>
                <th>所属部门</th>
                <th>岗位名称</th>
                <th>岗位等级</th>
                <th>人数</th>
                <th>添加时间</th>
                <th width="150">操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($info as $information)
                <tr>
                    <th scope="row">{{ $information->id }}</th>
                    <td>{{ $information->department }}</td>
                    <td>{{ $information->name }}</td>
                    <td>{{ $information->level }}</td>
                    <td>{{ $information->num }}</td>
                    <td>{{ $information->created_at }}</td>
                    <td>
                        <a href="{{ url('api/info/updatepost', ['id' => $information->id]) }}">修改</a>&nbsp;
                        <a href="{{ url('api/info/deletepost', ['id' => $information->id]) }}"
                            onclick="if (confirm('确定删除吗?') == false) return false;">删除</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div align="center">
            <a href="{{ url('api/info/createpost') }}">
                <button type="button" class="btn btn-primary" style="width:100px;height:40px;">新增岗位</button>
            </a>
        </div>
    </div>

    {{--<!-- 分页 -->--}}
    {{--<div>--}}
        {{--<div class="pull-right">--}}
            {{--{{ $info->render() }}--}}
        {{--</div>--}}
    {{--</div>--}}

@stop
