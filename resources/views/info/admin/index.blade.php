@extends('common.layouts')

@section('content')

    @include('common.message')

    <!-- 自定义内容区域 -->
    <div class="panel panel-default" style="width: 1000px">
        <div class="panel-heading">管理员列表</div>
        <form method="post">
            {{ csrf_field() }}
            <div class="col-lg-3 pull-right">
                <div class="input-group">
                    <input type="text" class="form-control" style="height: 35px" name="staff[id]" placeholder="姓名/职工号">
                    <span class="input-group-btn">
                        <button class="btn btn-primary" type="submit" style="height: 35px">搜索</button>
                    </span>
                </div>
            </div>
        </form>
        <table class="table table-hover table-striped table-responsive">
            <thead>
            <tr>
                <th>职工号</th>
                <th>姓名</th>
                <th>添加时间</th>
                <th width="220">操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($info as $information)
                <tr>
                    <th scope="row">{{ $information->id }}</th>
                    <td>{{ $information->name }}</td>
                    <td>{{ $information->created_at }}</td>
                    <td>
                        <a href="{{ url('api/info/canceladmin', ['id' => $information->id]) }}">取消管理员</a>&nbsp;
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>


@stop
