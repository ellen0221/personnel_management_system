<form class="form-horizontal" method="post" action="">

    {{ csrf_field() }}

    <div class="form-group">
        <label for="name" class="col-sm-2 control-lable">课程名</label>

        <div class="col-sm-5">
            <input type="text" name="Info[name]"
                   value="{{ old('Info')['name'] ? old('Info')['name'] : $info->name }}"
                   class="form-control" id="name" placeholder="请输入课程名">
        </div>
        {{--<div class="col-sm-5">--}}
            {{--<p class="form-control-static text-danger">{{ $errors->first('Info.name') }}</p>--}}
        {{--</div>--}}
    </div>
    <div class="form-group">
        <label for="book" class="col-sm-2 control-lable">教材</label>
        <div class="col-sm-5">
            <input type="text" name="Info[book]"
                   value="{{ old('Info')['book'] ? old('Info')['book'] : $info->book }}"
                   class="form-control" id="book" placeholder="请输入教材名称">
        </div>
        {{--<div class="col-sm-5">--}}
            {{--<p class="form-control-static text-danger">{{ $errors->first('Info.age') }}</p>--}}
        {{--</div>--}}
    </div>
    <div class="form-group">
        <label for="time" class="col-sm-2 control-lable">学时</label>

        <div class="col-sm-5">
            <input type="text" name="Info[time]"
                   value="{{ old('Info')['time'] ? old('Info')['time'] : $info->time }}"
                   class="form-control" id="time" placeholder="请输入学时">
        </div>
        {{--<div class="col-sm-5">--}}
            {{--<p class="form-control-static text-danger">{{ $errors->first('Info.education_background') }}</p>--}}
        {{--</div>--}}
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary" style="width:100px;height:40px;">提交</button>
            <a href="{{ url('api/info/courseindex') }}">
                <button type="button" class="btn btn-primary" style="width:100px;height:40px;">返回</button>
            </a>
        </div>
    </div>

</form>