<form class="form-horizontal" method="post" action="">

    {{ csrf_field() }}

    <div class="form-group">
        <label for="name" class="col-sm-2 control-lable">部门名称</label>

        <div class="col-sm-5">
            <input type="text" name="Info[name]"
                   value="{{ old('Info')['name'] ? old('Info')['name'] : $info->name }}"
                   class="form-control" id="name" placeholder="请输入部门名称">
        </div>
        {{--<div class="col-sm-5">--}}
            {{--<p class="form-control-static text-danger">{{ $errors->first('Info.name') }}</p>--}}
        {{--</div>--}}
    </div>
    <div class="form-group">
        <label for="function" class="col-sm-2 control-lable">职能</label>
        <div class="col-sm-5">
            <input type="text" name="Info[function]"
                   value="{{ old('Info')['function'] ? old('Info')['function'] : $info->function }}"
                   class="form-control" id="function" placeholder="请输入职能">
        </div>
        {{--<div class="col-sm-5">--}}
            {{--<p class="form-control-static text-danger">{{ $errors->first('Info.age') }}</p>--}}
        {{--</div>--}}
    </div>


    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary" style="width:100px;height:40px;">提交</button>
            <a href="{{ url('api/info/departmentindex') }}">
                <button type="button" class="btn btn-primary" style="width:100px;height:40px;">返回</button>
            </a>
        </div>
    </div>

</form>