@extends('common.layouts')

@section('content')

    @include('common.message')

    <!-- 自定义内容区域 -->
    <div class="panel panel-default" style="width: 1000px">
        <div class="panel-heading">搜索结果</div>
        <table class="table table-hover table-striped table-responsive">
            <thead>
            <tr>
                <th>职工号</th>
                <th>姓名</th>
                <th>年龄</th>
                <th>性别</th>
                <th>学历</th>
                <th>所属部门</th>
                <th>目前岗位</th>
                <th>添加时间</th>
                <th width="150">操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($info as $information)
                <tr>
                    <th scope="row">{{ $information->id }}</th>
                    <td>{{ $information->name }}</td>
                    <td>{{ $information->age }}</td>
                    {{--调用模型中的sex1方法--}}
                    <td>{{ $information->sex1($information->sex) }}</td>

                    <td>{{ $information->education_background }}</td>
                    <td>{{ $information->department_id }}</td>
                    <td>{{ $information->post_id }}</td>
                    {{--<td>{{ $information->department1($information->department) }}</td>--}}
                    {{--<td>{{ $information->post1($information->post) }}</td>--}}
                    <td>{{ $information->created_at }}</td>
                    <td>
                        <a href="{{ url('api/info/detail', ['id' => $information->id]) }}">详情</a>&nbsp;
                        <a href="{{ url('api/info/update', ['id' => $information->id]) }}">修改</a>&nbsp;
                        <a href="{{ url('api/info/delete', ['id' => $information->id]) }}"
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
