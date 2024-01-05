
@if(isset($options))
<div class="dropdown">
    <button type="button" class="btn-primary btn-mini dropdown-toggle btn-block bg-primary text-white border" data-bs-toggle="dropdown" id="dropdownMenu_{!! $options->first() !!}" aria-haspopup="true" aria-expanded="true">
        - Chọn -
        <span class="caret"></span>
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenu_{!! $options->first() !!}">
        @if(auth()->user()->can('read-customer'))
        <li><a class="dropdown-item" href="{{ route( getRouteNameWithAction('detail'), $options->first() ) }}" target="_self"><i class="fa fa-magnifying-glass"></i>&nbsp;&nbsp;Xem thông tin</a></li>
        @endif
        <hr class="dropdown-divider"></hr>
        @if(auth()->user()->can('edit-customer'))
        <li>
            <a class="dropdown-item" href="{{ route( getRouteNameWithAction('update') , $options->first() ) }}">
                <i class="fa fa-edit"></i>
                &nbsp;Sửa
            </a>
        </li>
        @endif
        <li>
            <a class="dropdown-item" href="{{ route( 'carelog.create', $options->first() ) }}">
                <i class="fa fa-edit"></i>
                &nbsp;Chăm khách
            </a>
        </li>
        @if(auth()->user()->can('delete-customer'))
        <li>
            <a class="dropdown-item" href="{{ route( getRouteNameWithAction('remove'), $options->first() ) }}"><i class="fa fa-trash"></i>&nbsp;Xóa</a>
        </li>
        @endif
    </ul>
</div>
@endisset