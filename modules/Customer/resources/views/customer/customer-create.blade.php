@extends('Customer::master')

@section('title', 'Thêm mới khách hàng')

@section('entry_content')

    @if(auth()->user()->can('add-customer'))
                
        {{ html()->form('POST')->route('create.' . substr(Route::current()->getPrefix(), 1))->open() }}
            <div class="pt-2">
                <div class="row g-2">

                    <ul class="nav nav-tabs">
                        <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#khach-hang">Khách hàng</a></li>
                        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#chi-tiet">Chi tiết</a></li>
                        @if(!auth()->user()->hasRole('user','guest'))
                        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#phu-trach">Người phụ trách</a></li>
                        @endif
                    </ul>

                    <div class="tab-content">
                        <div id="khach-hang" class="tab-pane fade in active show">
                            <div class="mt-2">
                                <h3>Thông tin khách hàng</h3>
                                <div class="row g-2">                    
                                    <!-- Mã khách hàng -->
                                    <div class="col-md-4 form-floating mb-3 visually-hidden">  
                                        <x-jangkeyte::forms.text name="ma_khach_hang" label="Mã khách hàng" />
                                    </div>
                                    
                                    <!-- Tên khách hàng -->
                                    <div class="col-md-4 mb-3">
                                        <x-jangkeyte::forms.text name="ten_khach_hang" label="Tên khách hàng" icon="fa fa-user" required="required" />
                                    </div>

                                    <!-- Số điện thoại -->
                                    <div class="col-md-4 form-floating mb-3">
                                        <x-jangkeyte::forms.text name="so_dien_thoai" label="Số điện thoại" icon="fa-solid fa-mobile-screen-button" required="required" autofocus="true" />
                                    </div>

                                    <!-- Giới tính -->
                                    <div class="col-md-4 mb-3">  
                                        <x-jangkeyte::forms.radio name="gioi_tinh" label="Giới tính" icon="fa-solid fa-venus-mars" :id="['nam', 'nu']" :choices="['Nam', 'Nữ']" :value="0" />
                                    </div>
                                    
                                    <!-- Thông tin liên hệ -->
                                    <div class="col-md-4 form-floating mb-3">
                                        <x-jangkeyte::forms.text name="thong_tin_lien_he" label="Email/Facebook" icon="fa-solid fa-square-share-nodes" />
                                    </div>

                                    <!-- Địa chỉ -->
                                    <div class="col-md-4 form-floating mb-3">
                                        <x-jangkeyte::forms.select name="dia_chi" label="Khu vực" icon="fa-solid fa-map-location-dot" :options="$tinh_thanh" default="1" />
                                    </div>

                                    <!-- Ghi chú -->
                                    <div class="col-md-4 form-floating mb-3">
                                        <x-jangkeyte::forms.text name="ghi_chu" label="Ghi chú" icon="fa-regular fa-clipboard" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="chi-tiet" class="tab-pane fade">
                            <div class="container-fluid mt-2">
                                <h3>Thông tin chi tiết</h3>
                                <div class="row g-2">     
                                    <!-- Nguồn khách -->
                                    <div class="col-md-4 form-floating mb-3">
                                        <x-jangkeyte::forms.select name="nguon_khach" label="Nguồn khách" icon="fa-solid fa-plug" :options="$nguon_khach" default="12" />   
                                    </div>

                                    <!-- Kênh liên hệ --> 
                                    <div class="col-md-4 form-floating mb-3">
                                        <x-jangkeyte::forms.select name="kenh_lien_he" label="Đầu tiếp nhận" icon="fa-solid fa-network-wired" :options="$kenh_lien_he" default="3" />               
                                    </div>

                                    <!-- Cách lấy số -->
                                    <div class="col-md-4 form-floating mb-3">
                                        <x-jangkeyte::forms.select name="cach_lay_so" label="Cách lấy số" icon="fa-solid fa-handshake-angle" :options="$cach_lay_so"/>  
                                    </div>

                                    <!-- Loại xe -->
                                    <div class="col-md-4 form-floating mb-3">
                                        <x-jangkeyte::forms.select name="loai_xe" label="Quân tâm" icon="fa-solid fa-motorcycle" :options="$loai_xe" />   
                                    </div>

                                    <!-- Thời gian nhận -->
                                    <div class="col-md-4 form-floating mb-3">
                                        <x-jangkeyte::forms.datetime name="thoi_gian_nhan" label="Có số ĐT khách lúc" icon="fa-solid fa-clock" />             
                                    </div>
                                    
                                    <!-- Thời gian chuyển -->
                                    <div class="col-md-4 form-floating mb-3">
                                        <x-jangkeyte::forms.datetime name="thoi_gian_chuyen" label="Chuyển khách lúc" icon="fa-solid fa-stopwatch" />             
                                    </div>
                                    
                                    <!-- Người chuyển -->
                                    <div class="col-md-4 form-floating mb-3 visually-hidden">
                                        <x-jangkeyte::forms.select name="nguoi_chuyen" label="Người chuyển" icon="fa-solid fa-people-arrows" :options="$danh_sach_nhan_vien" :value="auth()->user()->staff->ma_nhan_vien ?? 'F000'" />
                                    </div>
                        
                                    @if(checkRoute('/customer')) 
                                    <!-- Số khung -->
                                    <div class="col-md-4 form-floating mb-3">
                                        <x-jangkeyte::forms.text name="so_khung" label="Số khung" icon="fa-solid fa-fingerprint" />
                                    </div>

                                    <!-- Số máy -->
                                    <div class="col-md-4 form-floating mb-3">
                                        <x-jangkeyte::forms.text name="so_may" label="Số máy" icon="fa-solid fa-fingerprint" />
                                    </div>
                                    
                                    <!-- Màu xe -->
                                    <div class="col-md-4 form-floating mb-3">
                                        <x-jangkeyte::forms.text name="mau_xe" label="Màu xe" icon="fa-solid fa-palette" />
                                    </div>            
                                    @endif       
                                    
                                    <!-- Nhu cầu -->
                                    <div class="col-md-4 form-floating mb-3">
                                        <x-jangkeyte::forms.text name="nhu_cau" label="Nhu cầu cá nhân" />
                                    </div>
                     
                                </div>
                            </div>
                        </div>
                        @if(!auth()->user()->hasRole('user','guest'))
                        <div id="phu-trach" class="tab-pane fade">
                            <div class="container-fluid mt-2">
                                <h3>Người phụ trách</h3>
                                <div class="row g-2">     
                                    <!-- Nhân viên -->
                                    <div class="col-md-6 form-floating mb-3">
                                        <x-jangkeyte::forms.select name="nhan_vien" label="Người phụ trách" icon="fa-solid fa-people-arrows" :options="$danh_sach_nhan_vien" :value="auth()->user()->staff->ma_nhan_vien ?? 'F000'" />
                                    </div>

                                    <!-- Cửa hàng -->
                                    <div class="col-md-6 form-floating mb-3">
                                        <x-jangkeyte::forms.select name="cua_hang" label="Cửa hàng" icon="fa-solid fa-store" :options="$cua_hang" :value="auth()->user()->staff->cua_hang ?? '000'" />
                                    </div>                        
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>

                    <div class="row">
                        <div class="col-md-12 my-3 text-center">
                            <div class="form-group">
                                <x-jangkeyte::forms.button text="Lưu dữ liệu" icon="fa fa-save" class="btn btn-sm btn-success" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        {{ html()->form()->close() }}

        @pushOnce('scripts')
            <script> 
                function invoiceid() {
                    var d = new Date().getTime();
                    // Remove some of the X's to generate a smaller ID 
                    // You can also remove '-' if you don't want the ID formatted in sections
                    var uuid = 'xxxxxxxxxxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
                        var r = (d + Math.random()*16)%16 | 0;
                        d = Math.floor(d/16);
                        return (c=='x' ? r : (r&0x3|0x8)).toString(16);
                    });
                    document.getElementById('ma_khach_hang').value=uuid;
                    //return uuid;
                }
                window.onload=invoiceid;
            </script>
        @endpushOnce

    @else

        {{ abort(403) }}

    @endif

@endsection