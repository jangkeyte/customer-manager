@extends('JangKeyte::master')

@section('title', 'Trang đăng nhập')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            @include('Authetication::user.partials.changepwd_form')
        </div>
    </div>
</div>

@stop