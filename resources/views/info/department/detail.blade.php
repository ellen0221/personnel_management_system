@extends('common.layouts')

@section('content')
    <!-- 自定义内容区域 -->
    <div class="panel panel-default">
        <div class="panel-heading">部门信息详情</div>

        <table class="table table-bordered table-striped table-hover">
            <tbody>
            <tr>
                <td width="50%">部门号</td>
                <td>{{ $info->id }}</td>
            </tr>
            <tr>
                <td>部门名称</td>
                <td>{{ $info->name }}</td>
            </tr>
            <tr>
                <td>职能</td>
                <td>{{ $info->function }}</td>
            </tr>
            <tr>
                <td>所设岗位</td>
                <td>
                @foreach($post as $p)
                {{ $p->name.',' }}
                @endforeach
                </td>
            </tr>
            <tr>
                <td>添加日期</td>
                <td>{{ $info->created_at }}</td>
            </tr>
            <tr>
                <td>最后修改</td>
                <td>{{ $info->updated_at }}</td>
            </tr>
            </tbody>
        </table>
        <div align="center">
            <br>
            <a href="{{ url('api/info/departmentindex') }}">
                <button type="button"  style="width:100px;height:40px;">返回</button>
            </a>
        </div>
    </div>

@stop