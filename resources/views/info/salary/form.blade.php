<form class="form-horizontal" method="post" action="">

    {{ csrf_field() }}

    <div class="form-group">
        <label for="Info[id]" class="col-sm-2 control-lable">职工号</label>

        <div class="col-sm-5">
            <input type="text" name="Info[id]"
                   value="{{ old('Info')['id'] ? old('Info')['id'] : $info->staff_id }}"
                   class="form-control" id="id" placeholder="请输入职工号">
        </div>
        {{--<div class="col-sm-5">--}}
            {{--<p class="form-control-static text-danger">{{ $errors->first('Info.name') }}</p>--}}
        {{--</div>--}}
    </div>
    <div class="form-group">
        <label for="basic" class="col-sm-2 control-lable">基本工资</label>
        <div class="col-sm-5">
            <input type="text" name="Info[basic]"
                   value="{{ old('Info')['basic'] ? old('Info')['basic'] : $info->basic }}"
                   class="form-control" id="basic" placeholder="请输入基本工资">
        </div>
        {{--<div class="col-sm-5">--}}
            {{--<p class="form-control-static text-danger">{{ $errors->first('Info.age') }}</p>--}}
        {{--</div>--}}
    </div>
    <div class="form-group">
        <label for="level" class="col-sm-2 control-lable">级别工资</label>

        <div class="col-sm-5">
            <input type="text" name="Info[level]"
                   value="{{ old('Info')['level'] ? old('Info')['level'] : $info->level }}"
                   class="form-control" id="level" placeholder="请输入级别工资">
        </div>
        {{--<div class="col-sm-5">--}}
            {{--<p class="form-control-static text-danger">{{ $errors->first('Info.education_background') }}</p>--}}
        {{--</div>--}}
    </div>
    <div class="form-group">
        <label for="pension" class="col-sm-2 control-lable">养老金</label>

        <div class="col-sm-5">
            <input type="text" name="Info[pension]"
                   value="{{ old('Info')['pension'] ? old('Info')['pension'] : $info->pension }}"
                   class="form-control" id="pension" placeholder="请输入养老金">
        </div>
        {{--<div class="col-sm-5">--}}
            {{--<p class="form-control-static text-danger">{{ $errors->first('Info.department') }}</p>--}}
        {{--</div>--}}
    </div>
    <div class="form-group">
        <label for="unemployment" class="col-sm-2 control-lable">失业金</label>

        <div class="col-sm-5">
            <input type="text" name="Info[unemployment]"
                   value="{{ old('Info')['unemployment'] ? old('Info')['unemployment'] : $info->unemployment }}"
                   class="form-control" id="unemployment" placeholder="请输入失业金">
        </div>
        {{--<div class="col-sm-5">--}}
            {{--<p class="form-control-static text-danger">{{ $errors->first('Info.post') }}</p>--}}
        {{--</div>--}}
    </div>
    <div class="form-group">
        <label for="fund" class="col-sm-2 control-lable">公积金</label>

        <div class="col-sm-5">
            <input type="text" name="Info[fund]"
                   value="{{ old('Info')['fund'] ? old('Info')['fund'] : $info->fund }}"
                   class="form-control" id="fund" placeholder="请输入公积金">
        </div>
        {{--<div class="col-sm-5">--}}
        {{--<p class="form-control-static text-danger">{{ $errors->first('Info.post') }}</p>--}}
        {{--</div>--}}
    </div>
    <div class="form-group">
        <label for="tax" class="col-sm-2 control-lable">纳税</label>

        <div class="col-sm-5">
            <input type="text" name="Info[tax]"
                   value="{{ old('Info')['tax'] ? old('Info')['tax'] : $info->tax }}"
                   class="form-control" id="tax" placeholder="请输入纳税金额">
        </div>
        {{--<div class="col-sm-5">--}}
        {{--<p class="form-control-static text-danger">{{ $errors->first('Info.post') }}</p>--}}
        {{--</div>--}}
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary" style="width:100px;height:40px;">提交</button>
            <a href="{{ url('api/info/salaryindex') }}">
                <button type="button" class="btn btn-primary" style="width:100px;height:40px;">返回</button>
            </a>
        </div>
    </div>

</form>