@extends('JangKeyte::master')

@section('title','Danh sách Khách hàng')

@section('content')

@unless (Auth::check())
    <div class="alert alert-danger" role="alert">
        !!! Bạn chưa đăng nhập, vui lòng <a href="/login">đăng nhập</a> trước khi thực hiện thao tác.
    </div>    
@else

<div class="min-h-screen bg-gray-100">
    @include('JangKeyte::layouts.navigation')

    <!-- Page Heading -->
    @if (isset($header))
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endif

    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>
</div>

</html>

@endunless

@endsection