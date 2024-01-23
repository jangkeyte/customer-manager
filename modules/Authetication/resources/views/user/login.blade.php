@extends('JangKeyte::layouts.guest')

@section('title', 'Đăng nhập hệ thống')

@section('content')

<style>
    body{
        background-image: url('/assets/images/background.jpg');
        background-size: cover;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-md-4 mt-5">
            <main class="form-signin w-100 m-auto">
                <img class="mb-4 w-75" src="https://vespatopcom.com/wp-content/themes/vespatopcom/assets/images/logo.png">
                <form method="POST" action="{{ route('user.login') }}" id="adminForm" name="adminForm">           
                    @csrf         
                    <h1 class="h3 mb-3 fw-normal">Đăng nhập hệ thống</h1>
                    @if(session()->has('message'))
                        <div class="alert alert-danger">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    <fieldset>
                        <div class="form-floating">
                            {!! Form::text('username', old('username'), array('class' => 'form-control', 'placeholder' => 'Tên đăng nhập hoặc email')); !!}
                            <label for="username">Tên đăng nhập hoặc email</label>
                        </div>
                        <div class="form-floating">
                            {!! Form::password('password', array('class' => 'form-control', 'placeholder' => 'Mật khẩu')); !!}
                            <label for="password">Mật khẩu</label>
                        </div>
                        <div class="form-check text-start my-3">
                            <input class="form-check-input" type="checkbox" value="remember-me" id="remember">
                            <label class="form-check-label" for="flexCheckDefault">
                                Nhớ mật khẩu | <a href="/user/resetpwd">Quên mật khẩu?</a>
                            </label>
                        </div>
                        <button class="btn btn-primary w-100 py-2" type="submit"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><style>svg{fill:#ffffff}</style><path d="M352 96l64 0c17.7 0 32 14.3 32 32l0 256c0 17.7-14.3 32-32 32l-64 0c-17.7 0-32 14.3-32 32s14.3 32 32 32l64 0c53 0 96-43 96-96l0-256c0-53-43-96-96-96l-64 0c-17.7 0-32 14.3-32 32s14.3 32 32 32zm-9.4 182.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L242.7 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l210.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128z"/></svg>&nbsp;&nbsp; Đăng nhập</button>                        
                        <p class="mt-5 mb-3 text-body-secondary">Trang quản trị nội bộ của <strong>Vespa TOPCOM Sài Gòn</strong></p>                      
                    </fieldset>
                </form>
            </main>
        </div>
        <div class="col-md-8">
            <img src="/assets/images/login.svg" />
        </div>
    </div>
</div>

@endsection