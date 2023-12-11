@isset($target)
<form method="POST" action="{!! route($target . '.update') !!}" id="modifyObjectForm">        
    @csrf
    <div class="modal-header">
        <h4 class="modal-title">Cập nhật</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <div class="col-sm-12">
                <input type="hidden" class="form-control" id="id" name="id" placeholder="Nhập ID" value="" required>
            </div>
        </div>
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Tên</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên" value="" required>
            </div>
        </div>
    </div>
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy bỏ</button>
        <button type="submit" class="btn btn-primary">Lưu lại</button>
    </div>
</form>
@endisset