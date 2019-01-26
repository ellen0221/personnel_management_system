@extends('common.layouts')

@section('content')

    @include('common.message')

    <!-- 自定义内容区域 -->
    <div class="panel panel-default" style="width: 1000px">
        <div class="panel-heading">奖惩列表</div>
        <form method="post">
            {{ csrf_field() }}
            <div class=" pull-left">
                <a class="btn btn-primary" href="{{ url('api/info/allreward') }}">奖励统计</a>
                <a class="btn btn-primary" href="{{ url('api/info/allpunish') }}">惩罚统计</a>
            </div>
            <div class="col-lg-3 pull-right">
                <div class="input-group">
                    <input type="text" class="form-control" style="height: 35px" name="reward[id]" placeholder="项目名/职工号">
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
                    <th scope="row">{{ $information->staff_id }}</th>
                    <td>{{ $information->type2($information->type1) }}</td>
                    <td>{{ $information->project }}</td>
                    <td>{{ $information->sum1 }}</td>
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
            <a href="{{ url('api/info/createreward') }}">
                <button type="button" class="btn btn-primary" style="width:100px;height:40px;">新增奖惩</button>
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
