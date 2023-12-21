@isset($user)
<div class="list-group list-group-flush mt-3" id="accordion">
    <div class="card list-group-item-primary">
        <div class="card-header clearfix">
            <h4 class="mb-0 float-start">
                <a class="collapsed" data-bs-toggle="collapse" data-parent="#accordion" href="#userDetail" role="button" aria-expanded="false" aria-controls="userDetail">
                    Thông tin chi tiết người dùng
                </a>
            </h4>
            <div class="btn-group float-end">
                <a href="/user/update/{!! $user->id !!}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Sửa</a>
                <a href="{!! url()->previous() !!}" class="btn btn-warning btn-sm"><i class="fa fa-arrow-left"></i> Quay lại</a>
            </div>
        </div>
        <div id="userDetail" class="bg-light collapse show">
            <div class="row g-0">
                <div class="col-md-3 text-center mt-md-4 my-2">
                    @if(file_exists(public_path('/storage/uploads/users/' . $user->image))) 
                        <img src="{!! asset('/storage/uploads/users/' . $user->image) !!}" class="img-thumbnail rounded-circle w-75" title="{!! $user->name !!}" alt="{!! $user->name !!}">
                    @else 
                        <svg xmlns="http://www.w3.org/2000/svg" height="auto" width="50%" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>
                    @endif
                </div>
                <div class="col-md-9">
                    <table class="table table-responsive table-striped table-bordered table-hover">
                        <tbody>
                            <tr>
                                <td class="key">Mã định danh</td>
                                <td>{!! $user->uid !!}</td>
                            </tr>
                            <tr>
                                <td class="key" style="width:30%">Tên nhân viên</td>
                                <td>{!! $user->name !!}</td>
                            </tr>
                            <tr>
                                <td class="key">Tên tài khoản</td>
                                <td>{!! $user->username !!}</td>
                            </tr>
                            <tr>
                                <td class="key">Địa chỉ email</td>
                                <td>{!! $user->email !!}</td>
                            </tr>
                            <tr>
                                <td class="key">Ngày tạo</td>
                                <td>{!! $user->created_at !!}</td>
                            </tr>
                            <tr>
                                <td class="key">Vai trò</td>
                                <td>
                                    @include('Authetication::user.elements.role_list')
                                </td>
                            </tr>
                            <tr>
                                <td class="key">Quyền hạn</td>
                                <td>
                                    @include('Authetication::user.elements.permission_list')
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="card list-group-item-primary">
        <div class="card-header clearfix">
            <h4 class="mb-0 float-start">
                <a data-bs-toggle="collapse" data-parent="#accordion" href="#collapse2" class="collapsed" aria-expanded="false">
                    Quyền hạn được cấp
                </a>
            </h4>
            <div class="btn-group float-end">
                <!-- <a href="/user/update/{!! $user->id !!}" class="btn btn-primary btn-sm"><i class="bx bxs-plus-square"></i> Thêm mới</a> -->
            </div>
        </div>
        <div id="collapse2" class="panel-collapse collapse bg-light" aria-expanded="false">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <!--<div class="row"><div class="col-md-12"><h5>Quá trình chăm sóc cây xanh</h5></div></div>-->
                        <table class="table table-responsive table-striped table-bordered table-hover">
                            <tbody>
                                <tr>
                                    <th class="w10 text-center">TT</th>
                                    <th class="text-center">Quyền hạn</th>
                                    <th class="text-center">Nội dung</th>
                                    <th class="text-center">Ngày cấp</th>
                                    <th class="w10 text-center">Sửa</th>
                                    <th class="w10 text-center">Xóa</th>
                                </tr>
                            </tbody>
                                @isset($permissions)
                                    @foreach($permissions as $permission)
                                        @if($user->hasPermissionTo($permission))                                           
                                        <tr>
                                            <td class="text-center">{!! $loop->index + 1 !!}</td>
                                            <td>{!! $permission->name !!}</td>
                                            <td>{!! $permission->description !!}</td>
                                            <td class="text-center">{!! $permission->created_at !!}</td>
                                            <td class="text-center"><a href="#" data-bs-toggle="modal" data-bs-target="#modifyObjectModal"><i class="fa fa-edit"></i></a></td>
                                            <td class="text-center"><a href="#"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                                        </tr>
                                        @endif
                                    @endforeach
                                @endisset   
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@else
    <h1>Không tồn tại người dùng này</h1>
@endisset

@section('modals')
    {{-- @include('Authetication::log.elements.modal') --}}
@stop