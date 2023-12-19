<div class="card">
    <div class="card-header">
        <h4 class="mb-0 float-start">
            <a class="collapsed" data-bs-toggle="collapse" data-parent="#accordion" href="#userDetail" role="button" aria-expanded="false" aria-controls="userDetail">
                Danh sách người dùng
            </a>
        </h4>
        <div class="btn-group float-end">
            <a href="{!! route('user.create') !!}" class="btn btn-success btn-sm" data-bs-toggle="_modal" data-bs-target="#newUserModal" ><i class='bx bx-user-plus bx-xs'></i> <span class="d-none d-md-inline">Thêm mới</span></a>
            <!--<a href="{!! route('user.import') !!}" class="btn btn-primary btn-sm"><i class="fa fa-download"></i> <span class="d-none d-md-inline">Nhập dữ liệu từ file</span></a>-->
            <a href="{!! url()->previous() !!}" class="btn btn-warning btn-sm"><i class="fa fa-arrow-left"></i> <span class="d-none d-md-inline">Quay lại</span></a>
        </div>
    </div>
    <div class="card-body">
        <div class="cpanel">
            {!! Form::open(array('url' => route('user.search'), 'method' => 'post', 'files' => true)) !!}
                @csrf
                <!--search-->
                <div class="row mb-2">  
                    <div class="col-md-8">
                        <div class="form-group">
                            <input class="form-control input-sm" id="keyword" name="keyword" placeholder="Từ khóa" type="text" value="">
                        <input id="hdAction" name="hdAction" type="hidden" value="" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <div class="form-group text-start">
                                    <button class="btn btn-success btn-sm" type="submit" onclick="return ClearExport('hdAction');"><i class="fa fa-search"></i> <span class="d-none d-md-inline">Tìm kiếm</span></button>
                                    <!--
                                    <button class="btn btn-warning btn-sm" type="button" onclick="return ActionExport('hdAction', 'export', 'adminForm');"><i class="fa fa-upload"></i> <span class="d-none d-md-inline">Xuất tất cả</span></button>
                                    <button class="btn btn-primary btn-sm text-white" type="button" onclick="return ActionExport('hdAction', 'exportByCondition', 'adminForm');"><i class="fa fa-upload"></i> <span class="d-none d-md-inline">Xuất theo điều kiện</span></button>
                                    -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                   
            {!! Form::close() !!}
        </div>
    </div>
</div>