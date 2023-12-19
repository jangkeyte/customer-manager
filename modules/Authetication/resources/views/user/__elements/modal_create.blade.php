{!! Form::open(array('url' => route('user.create'), 'method' => 'post', 'id' => 'modifyUserForm', 'files' => true)) !!}     
    @csrf
    <div class="modal-header">
        <h4 class="modal-title">Tạo mới người dùng</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        @include('Authetication::user.elements.id')    
        <div class="row">
            <div class="col-md-6">
                @include('Authetication::user.elements.name') 
            </div>
            <div class="col-md-6">
                @include('Authetication::user.elements.email') 
            </div>
        </div>
        <div class="row">    
            <div class="col-md-6">
                @include('Authetication::user.elements.image')
            </div>
            <div class="col-md-6">
                @include('Authetication::user.elements.password')            
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                @include('Authetication::user.elements.role')
            </div>
            <div class="col-md-6">
                @include('Authetication::user.elements.permission')            
            </div>
        </div>
    </div>
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy bỏ</button>
        <button type="submit" class="btn btn-primary">Lưu lại</button>
    </div>
</form>
{!! Form::close() !!}