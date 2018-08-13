@if($user->active)
    <label class="label label-success">Đang hoạt động</label>
@else
    <label class="label label-danger">Cấm truy cập</label>
@endif