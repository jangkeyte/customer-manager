<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div class="col-12 form-floating mt-3">
            {!! Form::text('ten_nhan_vien', old('ten_nhan_vien'), array('class' => 'form-control')); !!}
            {!! Form::label('ten_nhan_vien', 'Tên nhân viên'); !!}
            @if($errors->has('ten_nhan_vien')) <div class="error-message">{{ $errors->first('ten_nhan_vien') }}</div> @endif 
        </div>

        <!-- Tên tài khoản -->
        <div class="col-12 form-floating mt-3">
            {!! Form::text('username', old('username'), array('class' => 'form-control')); !!}
            {!! Form::label('username', 'Tên tài khoản *'); !!}
            @if($errors->has('username')) <div class="error-message">{{ $errors->first('username') }}</div> @endif 
        </div>

        <!-- Giới tính -->
        <div class="col-12 form-floating mt-3">
            <div class="form-check form-check-inline form-switch">
                {!! Form::radio('gioi_tinh', 1, true, array('id' => 'gioi_tinh_nam', 'class' => 'form-check-input')); !!}
                {!! Form::label('gioi_tinh_nam', 'Nam', array('class' => 'form-check-label')); !!}
            </div>
            <div class="form-check form-check-inline form-switch">
                {!! Form::radio('gioi_tinh', 0, false, array('id' => 'gioi_tinh_nu', 'class' => 'form-check-input')); !!}
                {!! Form::label('gioi_tinh_nu', 'Nữ', array('class' => 'form-check-label')); !!}
            </div>
            @if($errors->has('gioi_tinh')) <div class="error-message">{{ $errors->first('gioi_tinh') }}</div> @endif 
        </div>

        <!-- Email Address -->
        <div class="col-12 form-floating mt-3">
            {!! Form::text('email', old('email'), array('class' => 'form-control')); !!}
            {!! Form::label('email', 'Địa chỉ email'); !!}
            @if($errors->has('email')) <div class="error-message">{{ $errors->first('email') }}</div> @endif 
        </div>

        <!-- Số điện thoại -->
        <div class="col-12 form-floating mt-3">
            {!! Form::text('so_dien_thoai', old('so_dien_thoai'), array('class' => 'form-control')); !!}
            {!! Form::label('so_dien_thoai', 'Số điện thoại'); !!}
            @if($errors->has('so_dien_thoai')) <div class="error-message">{{ $errors->first('so_dien_thoai') }}</div> @endif 
        </div>

        <!-- Chức vụ -->
        <div class="col-12 form-floating mt-3">
            {!! Form::select('chuc_vu', array(1 => 'Trưởng bộ phận', 2 => 'Cửa hàng trưởng', 3 => 'Nhân viên', 4 => 'Thử việc'), 3, array('class' => 'form-select')); !!}
            {!! Form::label('chuc_vu', 'Chức vụ'); !!}
            @if($errors->has('chuc_vu')) <div class="error-message">{{ $errors->first('chuc_vu') }}</div> @endif 
        </div>

        <!-- Password -->
        <div class="col-12 form-floating mt-3">
            {!! Form::password('password', array('class' => 'form-control')); !!}
            {!! Form::label('password', 'Mật khẩu *'); !!}
            @if($errors->has('password')) <div class="error-message">{{ $errors->first('password') }}</div> @endif 
        </div>

        <!-- Confirm Password -->
        <div class="col-12 form-floating mt-3">
            {!! Form::password('password_confirmation', array('class' => 'form-control')); !!}
            {!! Form::label('password_confirmation', 'Xác nhận mật khẩu *'); !!}
            @if($errors->has('password_confirmation')) <div class="error-message">{{ $errors->first('password_confirmation') }}</div> @endif 
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('login'))
                <a href="{{ route('login') }}">
                    {{ __('Đã có tài khoản?') }}
                </a>   
            @endif
            &nbsp;
            {!! Form::submit('Đăng ký!', array('class' => 'btn btn-dark bg-dark')); !!}
        </div>
    </form>
</x-guest-layout>
