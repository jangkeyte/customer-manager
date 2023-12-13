@extends('JangKeyte::master')

@section('title', 'Nhập xuất người dùng')

@section('content')

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('Authetication::user.partials.import')
                </div>
            </div>
        </div>

@stop
