@extends('layouts.app')

@section('content')
<div class="container" align="center">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">登录</div>
                <br>
                <div class="panel-body" align="center">
                    {{--<a href="{{ url('api/info/detail', ['id' => $information->id]) }}">详情</a>&nbsp;--}}
                    <form class="form-horizontal" method="POST" action="">
                        {{--{{ route('login') }}--}}
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('staff[id]') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">职工号</label>

                            <div class="col-md-6">
                                <input id="staff[id]" type="text" class="form-control" name="staff[id]" required autofocus>

                                @if ($errors->has('staff[id]'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('staff[id]') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('staff[password]') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">密码</label>

                            <div class="col-md-6">
                                <input id="staff[password]" type="password" class="form-control" name="staff[password]" required>

                                @if ($errors->has('staff[password]'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('staff[password]') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-0 col-sm-10">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> 记住我
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group" align="center">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" style="width: 80px" class="btn btn-primary">
                                    登录
                                </button>
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    忘记密码？
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
