<x-app-layout>
@isset($khach_hang)
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="text-center card-box">
                    <div class="member-card pt-2 pb-2">
                        <div class="thumb-lg member-thumb mx-auto w-50 mb-2"><img src="https://bootdey.com/img/Content/avatar/avatar2.png" class="rounded-circle img-thumbnail mx-auto" alt="profile-image"></div>
                        <div>
                            <h4 class="fs-2 fw-bold">{!! $khach_hang->ten_khach_hang !!}</h4>
                            <p class="text-muted">{{ !empty($khach_hang->province) && $khach_hang->province->id != 0 ? $khach_hang->province->name : $khach_hang->dia_chi }} <span>| </span><span><a href="tel:{!! $khach_hang->so_dien_thoai; !!}" class="text-pink">{!! Str::mask($khach_hang->so_dien_thoai, '*', 4, 3); !!}</a></span></p>
                        </div>
                        <ul class="social-links list-inline my-2">
                            <li class="list-inline-item"><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Facebook"><i class="fa fa-facebook"></i></a></li>
                            <li class="list-inline-item"><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Twitter"><i class="fa fa-twitter"></i></a></li>
                            <li class="list-inline-item"><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Skype"><i class="fa fa-skype"></i></a></li>
                        </ul>
                        <a href="tel:{!! $khach_hang->so_dien_thoai !!}" class="btn btn-dark bg-dark">Liên hệ ngay</a>
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
                        @if(Auth::user()->haveRights(array('edit_customer_0','edit_customer_1')))
                            <a class="btn btn-dark bg-dark" href="{!! route('capnhatkhachhang', $khach_hang->ma_khach_hang ) !!}" role="button">Cập nhật khách hàng</a>
                        @endif
                        @if(Auth::user()->haveRights(array('delete_customer_0','delete_customer_1')))
                            <a class="btn btn-dark bg-dark" href="{!! route('xoakhachhang', $khach_hang->ma_khach_hang ) !!}" role="button">Xóa khách hàng</a>
                        @endif
                        &nbsp;
                        @if(Auth::user()->haveRights('contact_customer'))
                        <a href="{!! route('chamsockhachhang', $khach_hang->ma_khach_hang) !!}" class="btn btn-dark bg-dark">Chăm sóc Khách</a>
                        @endif
                        <a class="btn btn-dark bg-dark" href="{!! url()->previous() !!}" role="button">Trở về</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- container -->
</div>
@endisset
</x-app-layout>