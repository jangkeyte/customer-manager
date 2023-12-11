@extends('JangKeyte::container')

@section('header-title', 'Đổi mật khẩu')

@section('main-content')
    <form action="/Account/ChangePwd" id="adminForm" method="post" name="adminForm">
        <div class="row">
            <div class="col-md-4 col-xs-12">
                <div class="form-group">
                    <label>Mật khẩu cũ <span class="rnred">(*)</span></label>
                    <input class="required txt form-control input-sm" id="txtOPwd" name="txtOPwd" type="password" value="">
                </div>
            </div>
            <div class="col-md-4 col-xs-12">
                <div class="form-group">
                    <label>Mật khẩu mới <span class="rnred">(*)</span></label>
                    <input class="required txt form-control input-sm" id="Pwd" minlength="5" name="Pwd" type="password">
                </div>
            </div>
            <div class="col-md-4 col-xs-12">
                <div class="form-group">
                    <label>Nhắc lại mật khẩu mới <span class="rnred">(*)</span></label>
                    <input class="required txt form-control  input-sm" equalto="#Pwd" id="ConfirmPwd" minlength="5" name="ConfirmPwd" type="password">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mt-2 text-center">
                <div class="form-group">
                    <button class="btn btn-sm btn-success" type="submit"><i class="fa fa-save"></i> Đổi mật khẩu </button> | <a href="/"> Quay lại trang chủ?</a>
                </div>
            </div>
        </div>
    </form>
@stop