<form class="form-horizontal" method="post" action="">

    {{ csrf_field() }}

    <div class="form-group">
        <label for="staff_id" class="col-sm-2 control-lable">职工号</label>

        <div class="col-sm-5">
            <input type="text" name="Info[staff_id]"
                   value="{{ old('Info')['staff_id'] ? old('Info')['staff_id'] : $info->staff_id}}"
                   class="form-control" id="id" placeholder="请输入奖惩对象职工号">
        </div>
        {{--<div class="col-sm-5">--}}
        {{--<p class="form-control-static text-danger">{{ $errors->first('Info.education_background') }}</p>--}}
        {{--</div>--}}
    </div>
    <div class="form-group">
        <label for="type1" class="col-sm-2 control-lable">奖励/惩罚</label>

        <div class="col-sm-5">
            @foreach($info->type2() as $key=>$val)
                {{--循环输出数组中的key和value--}}
                <label class="radio-inline">
                    <input type="radio" name="Info[type1]"
                           {{--判断奖惩信息中是否与选项相同,相同则选中--}}
                           {{ isset($info->type) && $info->type == $key ? 'checked' : ''}}
                           value="{{ $key }}"> {{ $val }}
                </label>
            @endforeach
        </div>
        {{--<div class="col-sm-5">--}}
            {{--<p class="form-control-static text-danger">{{ $errors->first('Info.sex') }}</p>--}}
        {{--</div>--}}
    </div>
    <div class="form-group">
        <label for="project" class="col-sm-2 control-lable">项目</label>

        <div class="col-sm-5">
            <input type="text" name="Info[project]"
                   value="{{ old('Info')['project'] ? old('Info')['project'] : $info->project}}"
                   class="form-control" id="project" placeholder="请输入奖惩项目名称">
        </div>
        {{--<div class="col-sm-5">--}}
            {{--<p class="form-control-static text-danger">{{ $errors->first('Info.education_background') }}</p>--}}
        {{--</div>--}}
    </div>
    <div class="form-group">
        <label for="sum1" class="col-sm-2 control-lable">奖惩金额</label>

        <div class="col-sm-5">
            <input type="text" name="Info[sum1]"
                   value="{{ old('Info')['sum1'] ? old('Info')['sum1'] : $info->sum1 }}"
                   class="form-control" id="sum1" placeholder="请输入奖惩金额">
        </div>
        {{--<div class="col-sm-5">--}}
            {{--<p class="form-control-static text-danger">{{ $errors->first('Info.department') }}</p>--}}
        {{--</div>--}}
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary" style="width:100px;height:40px;">提交</button>
            <a href="{{ url('api/info/rewardindex') }}">
                <button type="button" class="btn btn-primary" style="width:100px;height:40px;">返回</button>
            </a>
        </div>
    </div>

</form>