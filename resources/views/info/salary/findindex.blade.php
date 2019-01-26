@extends('common.layouts')

@section('content')

    @include('common.message')

    <!-- 自定义内容区域 -->
    <div class="panel panel-default" style="width: 1000px">
        <div class="panel-heading">搜索结果</div>
        <table class="table table-hover table-striped table-responsive">
            <thead>
            <tr>
                <th>工资号</th>
                <th>职工号</th>
                <th>基本工资</th>
                <th>级别工资</th>
                <th>养老金</th>
                <th>失业金</th>
                <th>公积金</th>
                <th>纳税</th>
                <th>添加时间</th>
                <th width="100">操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($info as $information)
                <tr>
                    <th scope="row">{{ $information->id }}</th>
                    <td>{{ $information->staff_id }}</td>
                    <td>{{ $information->basic }}</td>
                    <td>{{ $information->level }}</td>
                    <td>{{ $information->pension }}</td>
                    <td>{{ $information->unemployment }}</td>
                    <td>{{ $information->fund }}</td>
                    <td>{{ $information->tax }}</td>
                    <td>{{ $information->created_at }}</td>
                    <td>
                        <a href="{{ url('api/info/updatesalary', ['id' => $information->id]) }}">修改</a>&nbsp;
                        <a href="{{ url('api/info/deletesalary', ['id' => $information->id]) }}"
                           onclick="if (confirm('确定删除吗?') == false) return false;">删除</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div align="center">
            <a href="{{ url('api/info/index') }}">
                <button type="button" class="btn btn-primary" style="width:100px;height:40px;">返回</button>
            </a>
        </div>
    </div>

@stop
