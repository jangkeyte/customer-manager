@extends('Authetication::layouts.master')

@section('title', 'Trang đăng nhập')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3 mt-5">
            <div class="login-panel card card-default">
                <div class="card-header">
                    <h3 class="card-title">Đăng nhập</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('account.login') }}" id="adminForm" name="adminForm">
                        @csrf
                        <div class="validation-summary-valid" data-valmsg-summary="true">
                            <ul>
                                @if(isset($username)) 
                                    <li>{!! $username !!}</li>
                                @endif
                                <li style="display:none"></li>
                            </ul>
                        </div>
                        <fieldset>
                            <input id="hdAction" name="hdAction" type="hidden" value="" />
                            <div class="form-group mb-2">
                                {!! Form::text('username', old('username'), array('class' => 'form-control', 'placeholder' => 'Tên đăng nhập hoặc email')); !!}
                            </div>
                            <div class="form-group my-2">
                                {!! Form::password('password', array('class' => 'form-control', 'placeholder' => 'Mật khẩu')); !!}
                            </div>                    
                            <div class="checkbox my-2">
                                <!--
                                <label><div class="dropdown">
                                    <input id="ck" name="ck" type="checkbox" value="true" /><input name="ck" type="hidden" value="false" /> Nhớ mật khẩu? | <a href="/account/resetpwd">Quên mật khẩu?</a> | <a href="/">Trang chủ</a>
                                </label>
                                -->
                            </div><button class="btn btn-success btn-sm" type="button"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><style>svg{fill:#ffffff}</style><path d="M352 96l64 0c17.7 0 32 14.3 32 32l0 256c0 17.7-14.3 32-32 32l-64 0c-17.7 0-32 14.3-32 32s14.3 32 32 32l64 0c53 0 96-43 96-96l0-256c0-53-43-96-96-96l-64 0c-17.7 0-32 14.3-32 32s14.3 32 32 32zm-9.4 182.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L242.7 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l210.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128z"/></svg>&nbsp;&nbsp; Đăng nhập</button>
                            <button class="btn btn-primary btn-sm" type="button" onclick="return ActionExport('hdAction', 'microsoft', 'adminForm');"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><style>svg{fill:#ffffff}</style><path d="M0 32h214.6v214.6H0V32zm233.4 0H448v214.6H233.4V32zM0 265.4h214.6V480H0V265.4zm233.4 0H448V480H233.4V265.4z"/></svg>&nbsp;&nbsp; Đăng nhập bằng Office 365</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@stop
