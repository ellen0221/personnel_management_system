@extends('common.stafflayouts')

@section('content')

    @include('common.message')

    <!-- 自定义内容区域 -->
    <div class="panel panel-default" style="width: 1000px">
        <div class="panel-heading">个人信息</div>
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
            </tr>
            </thead>
            <tbody>
            {{--@foreach($info as $information)--}}
                <tr>
                    <th scope="row">{{ $information->id }}</th>
                    <td>{{ $information->name }}</td>
                    <td>{{ $information->age }}</td>
                    {{--调用模型中的sex1方法--}}
                    <td>{{ $information->sex }}</td>

                    <td>{{ $information->education_background }}</td>
                    <td>{{ $information->department_id }}</td>
                    <td>{{ $information->post_id }}</td>
                    {{--<td>{{ $information->department1($information->department) }}</td>--}}
                    {{--<td>{{ $information->post1($information->post) }}</td>--}}
                    <td>{{ $information->created_at }}</td>
                </tr>
            {{--@endforeach--}}
            </tbody>
        </table>
    </div>
    {{--<a>{{ $staff_id }}</a>--}}

@stop
