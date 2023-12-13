@extends('JangKeyte::master')

@section('title', 'Quản lý tài khoản')

@section('content')

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @include('Authetication::user.dashboard') 
                </div>
            </div>            
        </div>

@stop