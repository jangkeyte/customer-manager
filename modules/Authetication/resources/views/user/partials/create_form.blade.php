{!! Form::open(array('url' => route('user.create'), 'method' => 'post', 'files' => true)) !!}
    <div class="row">
        <div class="col-md-6 form-floating mb-3">
            <x-jangkeyte::forms.text name="name" label="Họ & tên" />
        </div>
        <div class="col-md-6 form-floating mb-3">
            <x-jangkeyte::forms.text name="email" label="Địa chỉ email" />
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 form-floating mb-3">
            <x-jangkeyte::forms.image name="image" label="Hình ảnh" />
        </div>
        <div class="col-md-6 form-floating mb-3">
            <x-jangkeyte::forms.password name="password" label="Mật khẩu" /> 
        </div>
    </div>
    @if(auth()->user()->hasRole('admin', 'administrator'))
    <div class="row">
        <div class="col-md-12">
            @include('Authetication::user.elements.role')
        </div>
        <div class="col-md-12">
            {{-- @include('Authetication::user.elements.permission') --}}
        </div>
    </div>
    @endif
    <div class="row">
        <div class="col-md-12 my-2 text-center">
            <div class="form-group">
                <button class="btn btn-sm btn-success" type="submit"><i class="fa fa-save"></i> Lưu dữ liệu</button>
            </div>
        </div>
    </div>
{!! Form::close() !!}