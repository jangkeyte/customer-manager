@if(isset($user))
<div class="dropdown">
    <button type="button" class="btn btn-primary btn-sm dropdown-toggle btn-block" data-bs-toggle="dropdown" id="dropdownMenu_{!! $user->id !!}" aria-haspopup="true" aria-expanded="true">
        - Chọn -
        <span class="caret"></span>
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenu_{!! $user->id !!}">
        <li><a class="dropdown-item" href="/user/detail/{!! $user->id !!}" target="_self"><i class="fa fa-info"></i>&nbsp;Chi tiết</a></li>
        <hr class="dropdown-divider"></hr>
        <li>
            <a class="dropdown-item" href="/user/update/{!! $user->id !!}" data-bs-toggle="__modal" data-bs-target="#modifyUserModal" data-bs-id="{!! $user->id !!}" data-bs-name="{!! $user->name !!}" data-bs-email="{!! $user->email !!}">
                <i class="fa fa-edit"></i>
                &nbsp;Sửa
            </a>
        </li>
        <li>
            <a class="dropdown-item" href="/user/remove/{!! $user->id !!}"><i class="fa fa-trash"></i>&nbsp;Xóa</a>
        </li>        
    </ul>
</div>
@endisset