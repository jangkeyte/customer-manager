
@if(isset($options))
<div class="dropdown">
    <button type="button" class="btn btn-primary btn-sm dropdown-toggle btn-block" data-bs-toggle="dropdown" id="dropdownMenu_{!! $options->first() !!}" aria-haspopup="true" aria-expanded="true">
        - Chọn -
        <span class="caret"></span>
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenu_{!! $options->first() !!}">
        <li><a class="dropdown-item" href="{{ route( Route::current()->getName() . '.detail', $options->first() ) }}" target="_self"><i class="fa fa-info"></i>&nbsp;Chi tiết</a></li>
        <hr class="dropdown-divider"></hr>
        <li>
            <a class="dropdown-item" href="{{ route( Route::current()->getName() . '.update', $options->first() ) }}">
                <i class="fa fa-edit"></i>
                &nbsp;Sửa
            </a>
        </li>
        <li>
            <a class="dropdown-item" href="{{ route( 'carelog.create', $options->first() ) }}">
                <i class="fa fa-edit"></i>
                &nbsp;Chăm khách
            </a>
        </li>
        <li>
            <a class="dropdown-item" href="{{ route( Route::current()->getName() . '.remove', $options->first() ) }}"><i class="fa fa-trash"></i>&nbsp;Xóa</a>
        </li>        
    </ul>
</div>
@endisset