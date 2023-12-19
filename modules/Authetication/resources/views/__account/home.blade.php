@extends('JangKeyte::layouts.master')

@section('title', 'Quản lý họ cây xanh')

@section('content')

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('TreeManager::common.dashboard') 
                </div>
            </div>            
        </div>

@stop

@section('scripts')
<!-- <script type="text/javascript" src="{{ asset('assets/js/admin/rnet.js') }}"></script> -->
@stop
