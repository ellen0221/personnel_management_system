<form class="form-horizontal" method="post" action="">

    {{ csrf_field() }}

    <div class="form-group">
        <label for="course_id" class="col-sm-2 control-lable">课程号</label>

        <div class="col-sm-5">
            <input type="text" name="Info[course_id]"
                   value="{{ $info->course_id }}"
                   class="form-control" id="course_id">
        </div>
        {{--<div class="col-sm-5">--}}
            {{--<p class="form-control-static text-danger">{{ $errors->first('Info.name') }}</p>--}}
        {{--</div>--}}
    </div>
    <div class="form-group">
        <label for="course_id" class="col-sm-2 control-lable">课程名</label>

        <div class="col-sm-5">
            <input type="text" name="Info[course_id]"
                   value="{{ $info->course_name }}"
                   class="form-control" id="course_id">
        </div>
        {{--<div class="col-sm-5">--}}
        {{--<p class="form-control-static text-danger">{{ $errors->first('Info.name') }}</p>--}}
        {{--</div>--}}
    </div>
    <div class="form-group">
        <label for="staff_id" class="col-sm-2 control-lable">职工号</label>
        <div class="col-sm-5">
            <input type="text" name="Info[staff_id]"
                   class="form-control" id="staff_id" placeholder="请输入职工号">
        </div>
        {{--<div class="col-sm-5">--}}
            {{--<p class="form-control-static text-danger">{{ $errors->first('Info.age') }}</p>--}}
        {{--</div>--}}
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary" style="width:100px;height:40px;">提交</button>
            <a href="{{ url('api/staff/showcourse/'.$info->staff_id) }}">
                <button type="button" class="btn btn-primary" style="width:100px;height:40px;">返回</button>
            </a>
        </div>
    </div>

</form>