@extends('JangKeyte::layouts.master')

@section('title', 'Trang đăng nhập')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            @include('Authetication::auth.partials.update_form')
        </div>
    </div>
</div>

@stop