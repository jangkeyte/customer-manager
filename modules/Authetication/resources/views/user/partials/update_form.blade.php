@isset($user)
{!! Form::open(array('url' => route('user.update'), 'method' => 'post', 'files' => true)) !!}
<div class="row mt-3">
    <div class="col-md-8">
        @include('Authetication::user.elements.id', array('default' => $user->id))    
        <div class="row">
            <div class="col-md-6">
                @include('Authetication::user.elements.name', array('default' => $user->name)) 
            </div>
            <div class="col-md-6">
                @include('Authetication::user.elements.email', array('default' => $user->email)) 
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
        @if(auth()->user()->hasRole('admin', 'administrator'))
        <div class="row">    
            <div class="col-md-6">
                @include('Authetication::user.elements.role')
            </div>
            <div class="col-md-6">
                @include('JangKeyte::commons.select', array('name' => 'cua_hang', 'label' => 'Cửa hàng', 'data' => array('133' => '133 Nguyễn Văn Trỗi')))            
            </div>
        </div>
        @endif
        <div class="row">
            <div class="col-md-12 my-3 text-center">
                <div class="form-group">
                    <button class="btn btn-sm btn-success" type="submit"><i class="fa fa-save"></i> Lưu dữ liệu</button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="col-12 text-center">
        @if(file_exists(public_path('/storage/uploads/users/' . $user->image))) 
            <img id="demo" src="{!! asset('/storage/uploads/users/' . $user->image) !!}" class="w-100">
        @else 
            <svg xmlns="http://www.w3.org/2000/svg" height="auto" width="50%" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>
        @endif 
        </div>
    </div>
</div>
{!! Form::close() !!}
@endisset