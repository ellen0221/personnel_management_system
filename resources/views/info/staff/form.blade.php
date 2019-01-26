<form class="form-horizontal" method="post" action="">

    {{ csrf_field() }}

    {{--@include('common.validator')--}}

    <div class="form-group">
        <label for="name" class="col-sm-2 control-lable">姓名</label>

        <div class="col-sm-5">
            <input type="text" name="Info[name]"
                   value="{{ old('Info')['name'] ? old('Info')['name'] : $info->name }}"
                   class="form-control" id="name" placeholder="请输入姓名">
        </div>
        {{--<div class="col-sm-5">--}}
            {{--<p class="form-control-static text-danger">{{ $errors->first('Info.name') }}</p>--}}
        {{--</div>--}}
    </div>
    <div class="form-group">
        <label for="age" class="col-sm-2 control-lable">年龄</label>
        <div class="col-sm-5">
            <input type="text" name="Info[age]"
                   value="{{ old('Info')['age'] ? old('Info')['age'] : $info->age }}"
                   class="form-control" id="name" placeholder="请输入年龄">
        </div>
        {{--<div class="col-sm-5">--}}
            {{--<p class="form-control-static text-danger">{{ $errors->first('Info.age') }}</p>--}}
        {{--</div>--}}
    </div>
    <div class="form-group">
        <label for="sex" class="col-sm-2 control-lable">性别</label>

        <div class="col-sm-5">
            @foreach($info->sex1() as $key=>$val)
                {{--循环输出数组中的key和value--}}
                <label class="radio-inline">
                    <input type="radio" name="Info[sex]"
                           {{--判断用户信息中的性别是否与选项相同,相同则选中--}}
                           {{ isset($info->sex) && $info->sex == $key ? 'checked' : ''}}
                           value="{{ $key }}"> {{ $val }}
                </label>
            @endforeach
        </div>
        {{--<div class="col-sm-5">--}}
            {{--<p class="form-control-static text-danger">{{ $errors->first('Info.sex') }}</p>--}}
        {{--</div>--}}
    </div>
    <div class="form-group">
        <label for="education_background" class="col-sm-2 control-lable">学历</label>

        <div class="col-sm-5">
            <input type="text" name="Info[education_background]"
                   value="{{ old('Info')['education_background'] ? old('Info')['education_background'] : $info->education_background }}"
                   class="form-control" id="education_background" placeholder="请输入学历">
        </div>
        {{--<div class="col-sm-5">--}}
            {{--<p class="form-control-static text-danger">{{ $errors->first('Info.education_background') }}</p>--}}
        {{--</div>--}}
    </div>
    {{--<div class="form-group">--}}
        {{--<label for="name" class="col-sm-2 control-lable">所属部门</label>--}}

        {{--<div class="col-sm-5">--}}
            {{--@foreach($info->department1() as $key=>$val)--}}
                {{--循环输出数组中的key和value--}}
                {{--<label class="radio-inline">--}}
                    {{--<input type="radio" name="Info[department]"--}}
                           {{--判断用户信息中的性别是否与选项相同,相同则选中--}}
                           {{--{{ isset($info->department) && $info->department == $key ? 'checked' : ''}}--}}
                           {{--value="{{ $key }}"> {{ $val }}--}}
                {{--</label>--}}
            {{--@endforeach--}}
        {{--</div>--}}
        {{--<div class="col-sm-5">--}}
            {{--<p class="form-control-static text-danger">{{ $errors->first('Info.department') }}</p>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div class="form-group">--}}
        {{--<label for="name" class="col-sm-2 control-lable">目前岗位</label>--}}

        {{--<div class="col-sm-5">--}}
            {{--@foreach($info->post1() as $key=>$val)--}}
                {{--循环输出数组中的key和value--}}
                {{--<label class="radio-inline">--}}
                    {{--<input type="radio" name="Info[post]"--}}
                           {{--判断用户信息中的目前岗位是否与选项相同,相同则选中--}}
                           {{--{{ isset($info->post) && $info->post == $key ? 'checked' : ''}}--}}
                           {{--value="{{ $key }}"> {{ $val }}--}}
                {{--</label>--}}
            {{--@endforeach--}}
        {{--</div>--}}
        {{--<div class="col-sm-5">--}}
            {{--<p class="form-control-static text-danger">{{ $errors->first('Info.post') }}</p>--}}
        {{--</div>--}}
    {{--</div>--}}

    <div class="form-group">
        <label for="department_id" class="col-sm-2 control-lable">所属部门</label>

        <div class="col-sm-5">
            <input type="text" name="Info[department_id]"
                   value="{{ old('Info')['department_id'] ? old('Info')['department_id'] : $info->department_id }}"
                   class="form-control" id="department_id" placeholder="请输入部门名称">
        </div>
        {{--<div class="col-sm-5">--}}
            {{--<p class="form-control-static text-danger">{{ $errors->first('Info.department') }}</p>--}}
        {{--</div>--}}
    </div>
    <div class="form-group">
        <label for="post_id" class="col-sm-2 control-lable">目前岗位</label>

        <div class="col-sm-5">
            <input type="text" name="Info[post_id]"
                   value="{{ old('Info')['post_id'] ? old('Info')['post_id'] : $info->post_id }}"
                   class="form-control" id="post_id" placeholder="请输入岗位名称">
        </div>
        {{--<div class="col-sm-5">--}}
            {{--<p class="form-control-static text-danger">{{ $errors->first('Info.post') }}</p>--}}
        {{--</div>--}}
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary" style="width:100px;height:40px;">提交</button>
            <a href="{{ url('api/info/index') }}">
                <button type="button" class="btn btn-primary" style="width:100px;height:40px;">返回</button>
            </a>
        </div>
    </div>

</form>