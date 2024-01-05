@extends('Authetication::master')

@section('title', 'Cập nhật người dùng')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            @include('Authetication::user.partials.update_form')
        </div>
    </div>
</div>

@stop
