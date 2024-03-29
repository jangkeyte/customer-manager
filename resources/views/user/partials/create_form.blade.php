@extends('JangKeyte::container')

@section('header-title', 'Tạo mới tài khoản')

@section('main-content')

{!! Form::open(array('url' => route('user.create'), 'method' => 'post', 'files' => true)) !!}
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
    @if(auth()->user()->hasRole('admin', 'administrator'))
    <div class="row">
        <div class="col-md-6">
            @include('Authetication::user.elements.role')
        </div>
        <div class="col-md-6">
            @include('Authetication::user.elements.permission')            
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

@stop