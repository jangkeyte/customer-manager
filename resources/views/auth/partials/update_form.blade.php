@extends('JangKeyte::container')

@section('header-title', 'Cập nhật thông tin tài khoản')

@section('main-content')

<form method="post" name="adminForm" id="adminForm" novalidate="novalidate">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Họ tên <span class="rnred">(*)</span></label>
                <input class="required form-control input-sm" id="Mb_Name" name="Mb.Name" type="text" value="{!! Auth::user()->name !!}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Email <span class="rnred">(*)</span></label>
                <input class="required form-control input-sm" id="Mb_Email" name="Mb.Email" type="text" value="{!! Auth::user()->email !!}">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>Giới thiệu </label>
                <textarea class="form-control input-sm" cols="20" id="Mb_Intro" name="Mb.Intro" rows="2" style="height:200px"></textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mt-2 text-center">
            <div class="form-group">
                <button class="btn btn-sm btn-success" type="submit"><i class="fa fa-save"></i> Lưu dữ liệu</button>
                <input data-val="true" data-val-number="The field Id must be a number." data-val-required="The Id field is required." id="Mb_Id" name="Mb.Id" type="hidden" value="2009">
            </div>
        </div>
    </div>
</form>

@stop