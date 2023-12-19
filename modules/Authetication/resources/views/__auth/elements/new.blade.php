@if(isset($target) && isset($data))
<a href="{!! route($target . '.create') !!}" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#newObjectModal" data-bs-whatever="{!! $data !!}"><i class="fa fa-edit"></i> Thêm mới</a>
@endif