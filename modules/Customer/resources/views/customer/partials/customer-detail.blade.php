@extends('Customer::master')

@section('title', 'Thông tin chi tiết khách hàng')

@section('entry_content')

@unless (Auth::check())

    <div class="alert alert-danger" role="alert">

        !!! Bạn chưa đăng nhập, vui lòng <a href="/login">đăng nhập</a> trước khi thực hiện thao tác.

    </div>

@else

    @isset($khach_hang)
        <div class="content">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-4 mx-auto mt-5">
                        <div class="card mb-3" style="max-width: 540px;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar2.png" class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">{!! $khach_hang->ten_khach_hang !!}</h5>
                                        <p class="card-text">
                                            <p class="text-muted">{{ !empty($khach_hang->province) && $khach_hang->province->id != 0 ? $khach_hang->province->name : $khach_hang->dia_chi }} <span>| </span><span><a href="tel:{!! $khach_hang->so_dien_thoai; !!}" class="text-pink">{!! Str::mask($khach_hang->so_dien_thoai, '*', 4, 3); !!}</a></span></p>    
                                        </p>
                                        <p class="card-text"><small class="text-body-secondary">
                                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                                @if(auth()->user()->can('edit_customer'))
                                                    <a class="btn btn-sm btn-warning" href="{!! route(routeAction('update'), $khach_hang->ma_khach_hang ) !!}" role="button">Cập nhật</a>
                                                @endif
                                                @if(auth()->user()->can('remove_customer'))
                                                    <a class="btn btn-sm btn-danger" href="{!! route(routeAction('remove'), $khach_hang->ma_khach_hang ) !!}" role="button">Xóa</a>
                                                @endif
                                                @if(auth()->user()->hasRole('user'))
                                                <a class="btn btn-sm btn-success" href="{!! route(routeAction('create', 'get', 'carelog'), $khach_hang->ma_khach_hang) !!}">Chăm sóc</a>
                                                @endif
                                                <a class="btn btn-sm btn-outline-dark" href="{!! url()->previous() !!}" role="button">Trở về</a>
                                            </div>
                                        </small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!--
                        <div class="text-center card-box">
                            <div class="member-card pt-2 pb-2">
                                <div class="thumb-lg member-thumb mx-auto w-50 mb-2"><img src="https://bootdey.com/img/Content/avatar/avatar2.png" class="rounded-circle img-thumbnail mx-auto" alt="profile-image"></div>
                                <div>
                                    <h4 class="fs-2 fw-bold">{!! $khach_hang->ten_khach_hang !!}</h4>
                                    <p class="text-muted">{{ !empty($khach_hang->province) && $khach_hang->province->id != 0 ? $khach_hang->province->name : $khach_hang->dia_chi }} <span>| </span><span><a href="tel:{!! $khach_hang->so_dien_thoai; !!}" class="text-pink">{!! Str::mask($khach_hang->so_dien_thoai, '*', 4, 3); !!}</a></span></p>
                                </div>
                                <ul class="social-links list-inline my-2">
                                    <li class="list-inline-item"><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Facebook"><i class="fa-brands fa-facebook"></i></a></li>
                                    <li class="list-inline-item"><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Twitter"><i class="fa-brands fa-twitter"></i></a></li>
                                    <li class="list-inline-item"><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Skype"><i class="fa-brands fa-skype"></i></a></li>
                                </ul>
                                <a href="tel:{!! $khach_hang->so_dien_thoai !!}" class="btn btn-sm btn-outline-dark">Liên hệ ngay</a>
                                <div class="mb-3 mt-1">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="mt-3">
                                                <p class="mb-0 text-muted">Dòng xe</p>
                                                <h4>{!! $khach_hang->loai_xe !!}</h4>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="mt-3">
                                                <p class="mb-0 text-muted">{!! !empty($khach_hang->ngay_mua) ? 'Ngày mua' : 'Ngày liên hệ' !!}</p>
                                                <h4>{!! !empty($khach_hang->ngay_mua) ? $khach_hang->ngay_mua : $khach_hang->ngay_lien_he !!}</h4>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="mt-3">
                                                <p class="mb-0 text-muted">Cửa hàng</p>
                                                <h4>{!! $khach_hang->cua_hang !!}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                    @if(auth()->user()->can('edit_customer'))
                                        <a class="btn btn-sm btn-warning" href="{!! route(routeAction('update'), $khach_hang->ma_khach_hang ) !!}" role="button">Cập nhật</a>
                                    @endif
                                    @if(auth()->user()->can('remove_customer'))
                                        <a class="btn btn-sm btn-danger" href="{!! route(routeAction('remove'), $khach_hang->ma_khach_hang ) !!}" role="button">Xóa</a>
                                    @endif
                                    @if(auth()->user()->hasRole('user'))
                                    <a class="btn btn-sm btn-success" href="{!! route(routeAction('create', 'get', 'carelog'), $khach_hang->ma_khach_hang) !!}">Chăm sóc</a>
                                    @endif
                                    <a class="btn btn-sm btn-outline-dark" href="{!! url()->previous() !!}" role="button">Trở về</a>
                                </div>
                            </div>
                        </div>
                    </div>
-->
                </div>
            </div>
            <!-- container -->
        </div>
    @else
        
    @endisset
@endif

@endsection