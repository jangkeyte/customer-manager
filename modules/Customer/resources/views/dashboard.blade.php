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

    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

            {{ __('Bảng điều khiển') }}

        </h2>

    </x-slot>



    <div class="py-4">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900">

                    {{ __("Bạn đã đăng nhập! Xin chào: ") . Auth::user()->ten_nhan_vien }}

                </div>

            </div>

        </div>

    </div>



    <div class="container py-4">

        <div class="row fs-4 fw-bold text-center">

            <div class="col-md-3 col-6 py-2">

                <a href="{!! route('customer-dashboard') !!}">

                    <img src="{{ asset('/assets/images/customers-icon.png') }}">

                    <span>Khách hàng đã mua</span>

                </a>

            </div>



            <div class="col-md-3 col-6 py-2">

                <a href="{!! route('client-dashboard') !!}">

                    <img src="{{ asset('/assets/images/icon-customer.svg') }}">

                    <span>Khách hàng tiềm năng</span>

                </a>

            </div>



            <div class="col-md-3 col-6 py-2">

                <a href="{!! route('profile.edit') !!}">

                    <img src="{{ asset('/assets/images/icon-profile-female.png') }}">

                    <span>Thông tin cá nhân</span>

                </a>

            </div>


            @if(Auth::user()->haveRights('import_data'))

            <div class="col-md-3 col-6 py-2">

                <a href="{!! route('dashboard') !!}">

                    <img src="{{ asset('/assets/images/icon-warehouse.svg') }}">

                    <span>Tồn kho</span>

                </a>

            </div>
            
            @endif

        </div>

    </div>



</x-app-layout>



@endunless



@endsection