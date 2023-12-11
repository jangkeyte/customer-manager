@extends('errors.layouts')

@section('code', '404')
@section('title', __('Không tìm thấy trang'))

@section('image')
    <div style="background-image: url({{ asset('/svg/404.svg') }});" class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
    </div>
@endsection

@section('message', __('Xin lỗi, trang bạn đang tìm kiếm không thể tìm thấy.'))