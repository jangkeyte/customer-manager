@extends('errors.layouts')

@section('code', '401')
@section('title', __('Không được phép'))

@section('image')
    <div style="background-image: url({{ asset('/svg/403.svg') }});" class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
    </div>
@endsection

@section('message', __('Rất tiếc, bạn không có quyền truy cập trang này.'))