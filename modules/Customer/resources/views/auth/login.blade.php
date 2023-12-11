<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    
    <div class="container">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            
            <!-- Địa chỉ Email -->
            <div class="row col-12 mb-3">
                {!! Form::label('email', 'Địa chỉ email', array('hidden' => 'hidden')); !!}
                {!! Form::text('email', 'test@gmail.com', array('class' => 'form-control', 'hidden' => 'hidden')); !!}
            </div>

            <!-- Tên tài khoản -->
            <div class="row col-12 mb-3">
                {!! Form::label('username', 'Tên tài khoản'); !!}
                {!! Form::text('username', old('username'), array('class' => 'form-control')); !!}
            </div>

            <!-- Mật khẩu -->
            <div class="row col-12 mb-3">
                {!! Form::label( 'password', __('Mật khẩu') ); !!}
                {!! Form::password('password', old('password'), array('class' => 'form-control')); !!}
            </div>

            <!-- Remember Me -->
            <div class="row mb-3">
                <div class="col-12">
                    {!! Form::checkbox('remember_me', 0, false, array('id' => 'remember_me', 'class' => 'form-check-input')); !!}
                    {!! Form::label('remember_me', __('Ghi nhớ'), array('class' => 'form-check-label')); !!}
                </div>
            </div>

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">
                    {{ __('Quên mật khẩu?') }}
                </a>
            @endif
            &nbsp;            
            {!! Form::submit('Đăng nhập!', array('class' => 'btn btn-dark bg-dark')); !!}
        </form>
    </div>
</x-guest-layout>
