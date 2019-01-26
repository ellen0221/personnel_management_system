@extends('common.layouts')

@section('content')

    @include('common.message')

    <!-- 自定义内容区域 -->
    <div class="panel panel-default" style="width: 1000px">
        <div class="panel-heading">部门列表</div>
        <form method="post">
            {{ csrf_field() }}
            <div class="col-lg-3 pull-right">
                <div class="input-group">
                    <input type="text" class="form-control" style="height: 35px" name="department[id]" placeholder="部门名/部门号">
                    <span class="input-group-btn">
                        <button class="btn btn-primary" type="submit" style="height: 35px">搜索</button>
                    </span>
                </div>
            </div>
        </form>
        <table class="table table-hover table-striped table-responsive">
            <thead>
            <tr>
                <th>部门号</th>
                <th>部门名称</th>
                <th>职能</th>
                <th>所设岗位</th>
                <th>添加时间</th>
                <th width="250">操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($info as $information)
                <tr>
                    <th scope="row">{{ $information->id }}</th>
                    <td>{{ $information->name }}</td>
                    <td>{{ $information->function }}</td>
                    <th>见详情</th>
                    <td>{{ $information->created_at }}</td>
                    <td>
                        <a href="{{ url('api/info/departmentdetail', ['id' => $information->id]) }}">详情</a>&nbsp;
                        <a href="{{ url('api/info/updatedepartment', ['id' => $information->id]) }}">修改</a>&nbsp;
                        <a href="{{ url('api/info/deletedepartment', ['id' => $information->id]) }}"
                            onclick="if (confirm('确定删除吗?') == false) return false;">删除</a>
                        <a href="{{ url('api/info/createpost', ['id' => $information->id]) }}">添加岗位</a>&nbsp;
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div align="center">
            <a href="{{ url('api/info/createdepartment') }}">
                <button type="button" class="btn btn-primary" style="width:100px;height:40px;">新增部门</button>
            </a>
        </div>
    </div>

    <!-- 分页 -->
    <div>
        <div class="pull-right">
            {{ $info->render() }}
        </div>
    </div>

@stop
