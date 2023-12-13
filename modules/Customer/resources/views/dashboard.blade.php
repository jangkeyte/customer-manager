@extends('Customer::master')

@section('entry_content')

@unless (Auth::check())

    <div class="alert alert-danger" role="alert">

        !!! Bạn chưa đăng nhập, vui lòng <a href="/login">đăng nhập</a> trước khi thực hiện thao tác.

    </div>

@else

    <div class="container-fluid">
                    
        @include('Customer::customer.partials.customer-list')

    </div>

@endunless

@endsection