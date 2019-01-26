<!-- 成功提示框 -->
@if(session()->has('success'))
<div class="alert alert-success alert-dismissable" role="alert" style="width: 1000px">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <strong>{{ session()->get('success') }}</strong>
</div>
@endif

<!-- 失败提示框 -->
@if(session()->has('error'))
<div class="alert alert-danger alert-dismissable" role="alert" style="width: 1000px">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <strong>{{ session()->get('error') }}</strong>
</div>
@endif
