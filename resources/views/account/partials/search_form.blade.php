@if(isset($name))
<div class="card">
    <div class="card-header">
        <h4 class="mb-0 float-start">
            <a class="collapsed" data-bs-toggle="collapse" data-parent="#accordion" href="#userDetail" role="button" aria-expanded="false" aria-controls="userDetail">
                Danh sách {!! $name !!}
            </a>
        </h4>
        <div class="btn-group float-end">
            <a href="{!! route('user.create') !!}" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#newUserModal" data-bs-whatever="user"><i class="fa fa-edit"></i> Thêm mới</a>
            <a href="{!! url()->previous() !!}" class="btn btn-warning btn-sm"><i class="fa fa-arrow-left"></i> Quay lại</a>
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
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <button class="btn btn-success btn-sm" type="submit"><i class="fa fa-search"></i> Tìm kiếm</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                   
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endif