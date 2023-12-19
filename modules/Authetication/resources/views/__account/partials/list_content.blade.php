@if(!$data->isEmpty() && isset($target))

<div class="col-12">
    <div class="mgt-5">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên người dùng</th>
                    <th>Địa chỉ email</th>
                    <th>#</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $user)
                <tr>
                    <td class="text-center">{{ $loop->index + 1 }}</td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn btn-primary btn-sm dropdown-toggle btn-block" data-bs-toggle="dropdown" id="dropdownMenu_{!! $user->id !!}" aria-haspopup="true" aria-expanded="true">
                                - Chọn -
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu_{!! $user->id !!}">
                                <li>
                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modifyUserModal" data-bs-id="{!! $user->id !!}" data-bs-name="{!! $user->name !!}">
                                        <i class="fa fa-edit"></i>&nbsp;Sửa
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{!! route('user.remove', $user->id) !!}"><i class="fa fa-trash"></i>&nbsp;Xóa</a>
                                </li>        
                            </ul>
                        </div>
                    </td>
                    <td>
                        {!! $user->name !!}
                    </td>
                    <td>
                        {!! $user->email !!}
                    </td>
                    <td class="text-center">
                        <a class="dropdown-item" href="{!! route('user.remove', $user->id) !!}"><i class='bx bx-message-square-x text-danger'></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@else
    @include('JangKeyte::partials.error404')
@endif

@section('modals')
    @include('TreeManager::common.elements.modal')
@stop