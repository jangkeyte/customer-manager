@if(isset($id) && isset($name))
<div class="dropdown">
    <button type="button" class="btn btn-primary btn-sm dropdown-toggle btn-block" data-bs-toggle="dropdown" id="dropdownMenu_{!! $id !!}" aria-haspopup="true" aria-expanded="true">
        - Chọn -
        <span class="caret"></span>
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenu_{!! $id !!}">
        <li>
            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modifyObjectModal" data-bs-id="{!! $id !!}" data-bs-name="{!! $name !!}">
                <i class="fa fa-edit"></i>&nbsp;Sửa
            </a>
        </li>
        <li>
            <a class="dropdown-item" href="{!! route('user.remove', $id) !!}"><i class="fa fa-trash"></i>&nbsp;Xóa</a>
        </li>        
    </ul>
</div>
@endisset