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
                <th>奖惩标志</th>
                <th>项目</th>
                <th>奖惩金额</th>
                <th>添加时间</th>
                <th width="150">操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($info as $information)
                <tr>
                    <th scope="row">{{ $information->id }}</th>
                    <td>{{ $information->type1($information->type }}</td>
                    <td>{{ $information->project }}</td>
                    <td>{{ $information->sum }}</td>
                    <td>{{ $information->created_at }}</td>
                    <td>
                        <a href="{{ url('api/info/updatereward', ['id' => $information->id]) }}">修改</a>&nbsp;
                        <a href="{{ url('api/info/deletereward', ['id' => $information->id]) }}"
                            onclick="if (confirm('确定删除吗?') == false) return false;">删除</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div align="center">
            <a href="{{ url('api/info/rewardindex') }}">
                <button type="button" class="btn btn-primary" style="width:100px;height:40px;">返回</button>
            </a>
        </div>
    </div>

@stop
