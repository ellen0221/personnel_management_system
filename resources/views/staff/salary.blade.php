@extends('common.stafflayouts')

@section('content')

    @include('common.message')

    <!-- 自定义内容区域 -->
    <div class="panel panel-default" style="width: 1000px">
        <div class="panel-heading">工资详情</div>
        <table class="table table-hover table-striped table-responsive">
            <thead>
            <tr>
                <th>工资号</th>
                <th>基本工资</th>
                <th>级别工资</th>
                <th>养老金</th>
                <th>失业金</th>
                <th>公积金</th>
                <th>纳税</th>
            </tr>
            </thead>
            <tbody>
            {{--@foreach($info as $information)--}}
                <tr>
                    <th scope="row">{{ $information->id }}</th>
                    <td>{{ $information->basic }}</td>
                    <td>{{ $information->level }}</td>
                    <td>{{ $information->pension }}</td>
                    <td>{{ $information->unemployment }}</td>
                    <td>{{ $information->fund }}</td>
                    <td>{{ $information->tax }}</td>
                </tr>
            {{--@endforeach--}}
            </tbody>
        </table>
    </div>

@stop
