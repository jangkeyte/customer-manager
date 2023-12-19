@extends('Customer::master')

@section('title', 'Cập nhật thông tin khách hàng')

@section('entry_content')

    @if(isset($customer))
    
        @if(auth()->user()->can('edit-customer'))
            
            {{ html()->form('POST')->route('update.' . substr(Route::current()->getPrefix(), 1) )->open() }}
                <div class="pt-2">
                    <div class="row g-2">

                        <ul class="nav nav-tabs">
                            <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#khach-hang">Khách hàng</a></li>
                            <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#chi-tiet">Chi tiết</a></li>
                            <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#phu-trach">Người phụ trách</a></li>
                        </ul>

                        <div class="tab-content">
                            <div id="khach-hang" class="tab-pane fade in active show">
                                <div class="mt-2">
                                    <h3>Thông tin khách hàng</h3>
                                    <div class="row g-2">                    
                                        <!-- Mã khách hàng -->
                                        <div class="col-md-4 form-floating mb-3">  
                                            <x-jangkeyte::forms.text name="ma_khach_hang" label="Mã khách hàng" :value="$customer->ma_khach_hang"/>
                                        </div>
                                        
                                        <!-- Tên khách hàng -->
                                        <div class="col-md-4 form-floating mb-3">
                                            <x-jangkeyte::forms.text name="ten_khach_hang" label="Tên khách hàng" :value="$customer->ten_khach_hang" />
                                        </div>

                                        <!-- Số điện thoại -->
                                        <div class="col-md-4 form-floating mb-3">
                                            <x-jangkeyte::forms.text name="so_dien_thoai" label="Số điện thoại" required="required" autofocus="true" :value="$customer->so_dien_thoai" />
                                        </div>

                                        <!-- Giới tính -->
                                        <div class="col-md-4 mb-3">  
                                            <x-jangkeyte::forms.radio name="gioi_tinh" label="Giới tính" :id="['nam', 'nu']" :choices="['Nam', 'Nữ']" :value="$customer->gioi_tinh" />
                                        </div>
                                                
                                        <!-- Thông tin liên hệ -->
                                        <div class="col-md-4 form-floating mb-3">
                                            <x-jangkeyte::forms.text name="thong_tin_lien_he" label="Email/Facebook" :value="$customer->thong_tin_lien_he" />
                                        </div>

                                        <!-- Địa chỉ -->
                                        <div class="col-md-4 form-floating mb-3">
                                            <x-jangkeyte::forms.select name="dia_chi" label="Khu vực" :options="$tinh_thanh" :value="$customer->dia_chi" />
                                        </div>

                                        <!-- Ghi chú -->
                                        <div class="col-md-4 form-floating mb-3">
                                            <x-jangkeyte::forms.text name="ghi_chu" label="Ghi chú" :value="$customer->ghi_chu" />
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
                                            <x-jangkeyte::forms.select name="nguon_khach" label="Nguồn khách" :options="$nguon_khach" :value="$customer->nguon_khach" default="12" />   
                                        </div>

                                        <!-- Kênh liên hệ --> 
                                        <div class="col-md-4 form-floating mb-3">
                                            <x-jangkeyte::forms.select name="kenh_lien_he" label="Đầu tiếp nhận" :options="$kenh_lien_he" :value="$customer->kenh_lien_he" default="3" />               
                                        </div>

                                        <!-- Cách lấy số -->
                                        <div class="col-md-4 form-floating mb-3">
                                            <x-jangkeyte::forms.select name="cach_lay_so" label="Cách lấy số" :options="$cach_lay_so" :value="$customer->cach_lay_so" default="1" />  
                                        </div>

                                        <!-- Loại xe -->
                                        <div class="col-md-4 form-floating mb-3">
                                            <x-jangkeyte::forms.select name="loai_xe" label="Quân tâm" :options="$loai_xe" :value="$customer->loai_xe" />   
                                        </div>

                                        <!-- Thời gian nhận -->
                                        <div class="col-md-4 form-floating mb-3">
                                            <x-jangkeyte::forms.datetime name="thoi_gian_nhan" label="Có số ĐT khách lúc" :value="$customer->thoi_gian_nhan" />             
                                        </div>
                                        
                                        <!-- Thời gian chuyển -->
                                        <div class="col-md-4 form-floating mb-3">
                                            <x-jangkeyte::forms.datetime name="thoi_gian_chuyen" label="Chuyển khách lúc" :value="$customer->thoi_gian_chuyen" />             
                                        </div>
                                        
                                        <!-- Người chuyển -->
                                        <div class="col-md-4 form-floating mb-3">
                                            <x-jangkeyte::forms.select name="nguoi_chuyen" label="Người chuyển" :options="$danh_sach_nhan_vien" :value="$customer->nguoi_chuyen" />
                                        </div>
                            
                                        <!-- Nhu cầu -->
                                        <div class="col-md-4 form-floating mb-3">
                                            <x-jangkeyte::forms.text name="nhu_cau" label="Nhu cầu cá nhân" :value="$customer->nhu_cau_ca_nhan" />
                                        </div>

                                        @if(Route::current()->getPrefix() == '/customer') 
                                        <!-- Số khung -->
                                        <div class="col-md-4 form-floating mb-3">
                                            <x-jangkeyte::forms.text name="so_khung" label="Số khung" :value="$customer->so_khung" />
                                        </div>

                                        <!-- Số máy -->
                                        <div class="col-md-4 form-floating mb-3">
                                            <x-jangkeyte::forms.text name="so_may" label="Số máy" :value="$customer->so_may" />
                                        </div>
                                        
                                        <!-- Màu xe -->
                                        <div class="col-md-4 form-floating mb-3">
                                            <x-jangkeyte::forms.text name="mau_xe" label="Màu xe" :value="$customer->mau_xe" />
                                        </div>
                                        @endif     
                                                        
                                        <!-- Tình trạng -->
                                        <div class="col-md-4 form-floating mb-3">
                                            <x-jangkeyte::forms.select name="tinh_trang" label="Tình trạng" :options="$tinh_trang" :value="$customer->tinh_trang" />
                                        </div>
                                        
                                        <!-- Loại khách -->
                                        <div class="col-md-4 form-floating mb-3">
                                            <x-jangkeyte::forms.select name="loai_khach" label="Loại khách" :options="$loai_khach" :value="$customer->loai_khach" />
                                        </div>       
                                    </div>
                                </div>
                            </div>
                            <div id="phu-trach" class="tab-pane fade">
                                <div class="container-fluid mt-2">
                                    <h3>Người phụ trách</h3>
                                    <div class="row g-2">     
                                        <!-- Nhân viên -->
                                        <div class="col-md-6 form-floating mb-3">
                                            <x-jangkeyte::forms.select name="nhan_vien" label="Người phụ trách" :options="$danh_sach_nhan_vien" :value="$customer->nhan_vien" />
                                        </div>

                                        <!-- Cửa hàng -->
                                        <div class="col-md-6 form-floating mb-3">
                                            <x-jangkeyte::forms.select name="cua_hang" label="Cửa hàng" :options="$cua_hang" :value="$customer->cua_hang" />
                                        </div>                        
                                    </div>
                                </div>
                            </div>
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

        @else

            {{ abort(403) }}

        @endif

    @else

        {{ abort(404) }}

    @endif

@endsection