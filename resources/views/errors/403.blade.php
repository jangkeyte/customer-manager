@extends('errors.layouts')

@section('code', '403')
@section('title', __('Không được phép'))

@section('image')
    <div style="background-image: url({{ asset('/svg/403.svg') }});" class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
    </div>
@endsection

@section('message', __( empty( $exception->getMessage() ) ? 'Rất tiếc, bạn bị cấm truy cập trang này.' : $exception->getMessage() ) )