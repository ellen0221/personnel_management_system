@extends('common.layouts')

@section('content')

    @include('common.message')

    <!-- 自定义内容区域 -->
    <div class="panel panel-default" style="width: 1000px">
        <div class="panel-heading">奖惩统计</div>
        <table class="table table-hover table-striped table-responsive">
            <thead>
            <tr>
                <th>职工号</th>
                <th>奖励次数</th>
                <th>奖励总额</th>
                {{--<th>惩罚次数</th>--}}
            </tr>
            </thead>
            <tbody>
            @foreach($info as $information)
                <tr>
                    <th scope="row">{{ $information->staff_id }}</th>
                    <td>{{ $information->rewardtimes }}</td>
                    <td>{{ $information->rewardsum }}</td>
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

    <!-- 分页 -->
    {{--<div>--}}
        {{--<div class="pull-right">--}}
            {{--{{ $info->render() }}--}}
        {{--</div>--}}
    {{--</div>--}}

@stop
