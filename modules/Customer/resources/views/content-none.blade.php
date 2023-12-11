@extends('master')

@section('title','Thông tin cá nhân')

@section('content')

@unless (Auth::check())
    <div class="alert alert-danger" role="alert">
        !!! Bạn chưa đăng nhập, vui lòng <a href="/login">đăng nhập</a> trước khi thực hiện thao tác.
    </div>
@else

<!-- jangkeyte@gmail.com | myvMqcH4ULQ9N6J -->

<x-app-layout>

<div class="container pt-2">
    <div class="row g-2">
        <div class="alert alert-danger" role="alert">
            Không tồn tại Khách hàng {!! $khach_hang !!}. Vui lòng <a href="{!! route('dashboard') !!}" class="alert-link">quay lại</a>.
        </div>
    </div>
</div>
</x-app-layout>

@endunless

@endsection