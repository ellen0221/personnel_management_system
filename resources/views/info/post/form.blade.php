<form class="form-horizontal" method="post" action="">

    {{ csrf_field() }}

    <div class="form-group">
        <label for="name" class="col-sm-2 control-lable">岗位名称</label>

        <div class="col-sm-5">
            <input type="text" name="Info[name]"
                   value="{{ old('Info')['name'] ? old('Info')['name'] : $info->name }}"
                   class="form-control" id="name" placeholder="请输入岗位名称">
        </div>
        {{--<div class="col-sm-5">--}}
            {{--<p class="form-control-static text-danger">{{ $errors->first('Info.name') }}</p>--}}
        {{--</div>--}}
    </div>
    <div class="form-group">
        <label for="level" class="col-sm-2 control-lable">岗位等级</label>
        <div class="col-sm-5">
            <input type="text" name="Info[level]"
                   value="{{ old('Info')['level'] ? old('Info')['level'] : $info->level }}"
                   class="form-control" id="level" placeholder="请输入岗位等级">
        </div>
        {{--<div class="col-sm-5">--}}
            {{--<p class="form-control-static text-danger">{{ $errors->first('Info.age') }}</p>--}}
        {{--</div>--}}
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary" style="width:100px;height:40px;">提交</button>
            <a href="{{ url('api/info/postindex') }}">
                <button type="button" class="btn btn-primary" style="width:100px;height:40px;">返回</button>
            </a>
        </div>
    </div>

</form>