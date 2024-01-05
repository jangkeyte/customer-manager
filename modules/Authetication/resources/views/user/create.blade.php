@extends('Authetication::master')

@section('title', 'Tạo mới người dùng')

@section('content')

<div class="container">
    <div class="row mt-3">
        <div class="col-md-12">
            @include('Authetication::user.partials.create_form')
        </div>
    </div>
</div>

@stop
