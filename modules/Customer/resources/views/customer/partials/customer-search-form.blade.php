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
<hr>

<div class="container-fluid px-0 mx-0 mt-2">
    
    @if(Route::current()->getPrefix() == '/customer') 
    <form method="POST" action="{{ route('customer.search') }}">
    @else
    <form method="POST" action="{{ route('client.search') }}">
    @endif
        @csrf
        <div class="row">

            <!-- Từ khóa -->
            <div class="col-md-3 form-floating mb-3">
                @include('JangKeyte::commons.text', array('name' => 'keyword', 'label' => 'Từ khóa'))
            </div>
            
            <!-- Cửa hàng -->
            <div class="col-md-1 form-floating mb-3">
                @include('JangKeyte::commons.select', array('name' => 'cua_hang', 'label' => 'Cửa hàng', 'data' => $cua_hang))
            </div>

            <!-- Nhân viên -->
            <div class="col-md-1 form-floating mb-3">
                @include('JangKeyte::commons.select', array('name' => 'nhan_vien', 'label' => 'Nhân viên', 'data' => $nhan_vien))
            </div>

            <!-- Nguồn khách -->
            <div class="col-md-1 form-floating mb-3">
                @include('JangKeyte::commons.select', array('name' => 'nguon', 'label' => 'Nguồn khách', 'data' => $nguon_khach))
            </div>

            <!-- Tình trạng -->
            <div class="col-md-1 form-floating mb-3">
                @include('JangKeyte::commons.select', array('name' => 'kenh_lien_he', 'label' => 'Kênh liên hệ', 'data' => $kenh_lien_he))
            </div>

            <!-- Trong tháng -->
            <div class="col-md-1 form-floating mb-3">
                @include('JangKeyte::commons.select', array('name' => 'thoi_gian', 'label' => 'Trong tháng', 'data' => $thoi_gian))
            </div>

            <!-- Thời gian -->
            <div class="col-md-1 form-floating mb-3">
                @include('JangKeyte::commons.date', array('name' => 'tu_ngay', 'label' => 'Từ ngày'))
            </div>

            <div class="col-md-1 form-floating mb-3">
                @include('JangKeyte::commons.date', array('name' => 'den_ngay', 'label' => 'Đến ngày'))
            </div>
            
            <!-- Order by -->
            <div class="col-md-1 form-floating mb-3">
            @include('JangKeyte::commons.select', array('name' => 'sap_xep', 'label' => 'Sắp xếp theo'))
            </div>

            <!-- Order by -->
            <div class="col-md-1 form-floating mb-3">
            @include('JangKeyte::commons.select', array('name' => 'sap_xep_theo', 'label' => 'Chiều hướng', 'data' => array('asc' => 'Tăng dần', 'desc' => 'Giảm dần')))
            </div>
            
            <!-- Nguồn khách -->
            <div class="col-md-1 mb-2">
                
            </div>
        </div>
    </form>
</div>