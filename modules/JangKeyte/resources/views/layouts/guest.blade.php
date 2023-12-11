@extends('JangKeyte::master')

@section('title','Danh sách Khách hàng')

@section('content')

<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
    <div>
        <a href="/">
        <img src="https://vespatopcom.com/wp-content/themes/vespatopcom/assets/images/logo.png"  class="block w-auto fill-current text-gray-800" alt="Logo" title="Logo">
        </a>
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>

@endsection