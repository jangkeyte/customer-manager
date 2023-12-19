@extends('Authetication::master')

@section('title', 'Chi tiết người dùng')

@section('entry_content')

<div class="container g-0">
    <div class="row">
        <div class="col-md-12 g-0">
            @include('Authetication::user.partials.detail_content') 
        </div>
    </div>            
</div>

@stop