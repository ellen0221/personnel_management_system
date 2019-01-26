{{--@if(count($errors))     <!--判断错误信息是否存在,$errors是中间件web返回的一个错误信息(在Kernel.php中可查看方法ShareErrorsFromSession)-->--}}
    {{--<!-- 所有的错误提示 -->--}}
    {{--<div class="alert alert-danger">--}}
        {{--<ul>--}}
            {{--@foreach($errors->all() as $error)--}}
            {{--<li>{{ $error }}</li>--}}
            {{--@endforeach--}}
        {{--</ul>--}}
    {{--</div>--}}
{{--@endif--}}