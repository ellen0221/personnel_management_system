@extends('common.stafflayouts')

@section('content')

    <!-- 自定义内容区域 -->
    <div class="panel panel-default" style="width: 1000px">
        <div class="panel-heading">奖惩记录</div>
        <table class="table table-hover table-striped table-responsive">
            <thead>
            <tr>
                <th>奖惩号</th>
                <th>奖惩标志</th>
                <th>项目</th>
                <th>奖惩金额</th>
            </tr>
            </thead>
            <tbody>
            @foreach($info as $information)
                <tr>
                    <th scope="row">{{ $information->id }}</th>
                    <td>{{ $reward->type2($information->type1) }}</td>
                    <td>{{ $information->project }}</td>
                    <td>{{ $information->sum1 }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@stop
