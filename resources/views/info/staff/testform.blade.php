<div class="panel panel-default">
    <div class="panel-heading">新增职工</div>
    <div class="panel-body">
        <form class="form-horizontal" method="post" action="">

            {{ csrf_field() }}

            <div class="form-group">
                <label for="name" class="col-sm-2 control-lable">姓名</label>

                <div class="col-sm-5">
                    <input type="text" name="Info[name]"
                           class="form-control" id="name" placeholder="请输入姓名">
                </div>
                {{--value="{{ old('Info')['name'] ? old('Info')['name'] : $info->name }}"--}}
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
                <label for="department" class="col-sm-2 control-lable">所属部门</label>

                <div class="col-sm-5">
                    <input type="text" name="Info[department]"
                           value="{{ old('Info')['department'] ? old('Info')['department'] : $info->department_id }}"
                           class="form-control" id="department" placeholder="请输入部门名称">
                </div>
                {{--<div class="col-sm-5">--}}
                    {{--<p class="form-control-static text-danger">{{ $errors->first('Info.department') }}</p>--}}
                {{--</div>--}}
            </div>
            <div class="form-group">
                <label for="post" class="col-sm-2 control-lable">目前岗位</label>

                <div class="col-sm-5">
                    <input type="text" name="Info[post]"
                           value="{{ old('Info')['post'] ? old('Info')['post'] : $info->post_id }}"
                           class="form-control" id="post" placeholder="请输入岗位名称">
                </div>
                {{--<div class="col-sm-5">--}}
                    {{--<p class="form-control-static text-danger">{{ $errors->first('Info.post') }}</p>--}}
                {{--</div>--}}
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">提交</button>
                </div>
            </div>
        </form>
    </div>
</div>

