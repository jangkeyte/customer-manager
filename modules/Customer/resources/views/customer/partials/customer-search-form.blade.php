<!--
<h3>Tìm nhanh Khách hàng</h3>
<div class="flex-center position-ref full-height">
    <div class="content">
        <form class="typeahead" role="search">
            <input type="search" name="q" class="form-control search-input" placeholder="Nhập từ khóa..." autocomplete="off">
        </form>
    </div>
</div>
--> 

<div class="container-fluid px-0 mx-0 mt-2">
    
    @if(Route::is('customer-dashboard') || Route::is('timkhachhang') || Route::is('khachhang')) 
    <form method="POST" action="{{ route('timkhachhang') }}">
    @else
    <form method="POST" action="{{ route('timkhachhangtiemnang') }}">
    @endif
        @csrf
        <div class="row">

            <!-- Từ khóa -->
            @include('customer.elements.sf_tu_khoa')
            
            <!-- Cửa hàng -->
            @include('customer.elements.sf_cua_hang') 

            <!-- Nhân viên -->
            @include('customer.elements.sf_nhan_vien') 

            <!-- Nguồn khách -->
            @include('customer.elements.sf_nguon_khach')

            <!-- Tình trạng -->
            @include('customer.elements.sf_tinh_trang')

            <!-- Trong tháng -->
            @include('customer.elements.sf_trong_thang')

            <!-- Thời gian -->
            <div class="col-md-2 form-floating mb-3">
                @include('customer.elements.tu_ngay')  
            </div>

            <div class="col-md-2 form-floating mb-3">
                @include('customer.elements.den_ngay') 
            </div>
            
            <!-- Order by -->
            <div class="col-md-1 form-floating mb-3">
                @include('customer.elements.sf_sap_xep') 
            </div>

            <!-- Order by -->
            <div class="col-md-1 form-floating mb-3">
                @include('customer.elements.sf_sap_xep_theo') 
            </div>
            
            <!-- Nguồn khách -->
            <div class="col-md-1 mb-2">
                <x-primary-button class="ml-4">
                    {{ __('Tìm kiếm') }}
                </x-primary-button>
            </div>
        </div>
    </form>
</div>