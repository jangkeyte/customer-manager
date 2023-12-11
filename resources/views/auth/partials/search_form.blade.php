@if(isset($target) && isset($name))
<div class="card">
    <div class="card-header">
        <h4 class="mb-0 float-start">
            <a class="collapsed" data-bs-toggle="collapse" data-parent="#accordion" href="#treeDetail" role="button" aria-expanded="false" aria-controls="treeDetail">
                Danh sách {!! $name !!}
            </a>
        </h4>
        <div class="btn-group float-end">
            @include('Authetication::auth.elements.new', array('data' => $target))
            <a href="{!! url()->previous() !!}" class="btn btn-warning btn-sm"><i class="fa fa-arrow-left"></i> Quay lại</a>
        </div>
    </div>
    <div class="card-body">
        <div class="cpanel">
            {!! Form::open(array('url' => route($target . '.search'), 'method' => 'post', 'files' => true)) !!}
                @csrf
                <!--search-->
                <div class="row mb-2">  
                    <div class="col-md-8">
                    <input class="form-control input-sm" id="keyword" name="keyword" placeholder="Từ khóa" type="text" value="">
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <button class="btn btn-success btn-sm" type="submit" onclick="return ClearExport('hdAction');"><i class="fa fa-search"></i> Tìm kiếm</button>
                                    <button class="btn btn-warning btn-sm" type="button" onclick="return ActionExport('hdAction', 'export', 'adminForm');"><i class="fa fa-upload"></i>&nbsp;&nbsp;Xuất tất cả</button>
                                    <button class="btn btn-primary btn-sm text-white" type="button" onclick="return ActionExport('hdAction', 'exportByCondition', 'adminForm');"><i class="fa fa-upload"></i>&nbsp;&nbsp;Xuất theo điều kiện</button>
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