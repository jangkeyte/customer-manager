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
                <x-jangkeyte::forms.text name="keyword" label="Từ khóa" />
            </div>
            
            <!-- Nếu không phải là người dùng hoặc khách thì có thể tìm kiếm theo cửa hàng và nhân viên -->
            @if(!auth()->user()->hasRole('user','guest'))

                <!-- Nếu không phải là trưởng nhóm thì có thể tìm kiếm theo cửa hàng -->
                @if(!auth()->user()->hasRole('leader'))
                    <!-- Cửa hàng -->
                    <div class="col-md-1 form-floating mb-3">
                        <x-jangkeyte::forms.select name="cua_hang" label="Cửa hàng" :options="$cua_hang" />
                    </div>
                @endif
                
                <!-- Nhân viên -->
                <div class="col-md-1 form-floating mb-3">
                    <x-jangkeyte::forms.select name="nhan_vien" label="Nhân viên" :options="$nhan_vien" />
                </div>
            @endif
            
            <!-- Nguồn khách -->
            <div class="col-md-1 form-floating mb-3">
                <x-jangkeyte::forms.select name="nguon" label="Nguồn khách" :options="$nguon_khach" />
            </div>

            <!-- Tình trạng -->
            <div class="col-md-1 form-floating mb-3">
                <x-jangkeyte::forms.select name="kenh_lien_he" label="Kênh liên hệ" :options="$kenh_lien_he" />
            </div>

            <!-- Trong tháng -->
            <div class="col-md-1 form-floating mb-3">
                <x-jangkeyte::forms.select name="thoi_gian" label="Trong tháng" :options="$thoi_gian" />
            </div>

            <!-- Thời gian -->
            <div class="col-md-1 form-floating mb-3">
                <x-jangkeyte::forms.date name="tu_ngay" label="Từ ngày" />   
            </div>

            <div class="col-md-1 form-floating mb-3">
                <x-jangkeyte::forms.date name="den_ngay" label="Đến ngày" />   
            </div>
            
            <!-- Order by -->
            <div class="col-md-1 form-floating mb-3">
                <x-jangkeyte::forms.select name="sap_xep" label="Sắp xếp theo" :options="$sap_xep" />
            </div>

            <!-- Order by -->
            <div class="col-md-1 form-floating mb-3">
                <x-jangkeyte::forms.select name="sap_xep_theo" label="Chiều hướng" :options="$sap_xep_theo" />
            </div>
            
            <!-- Nguồn khách -->
            <div class="col-md-1 mb-2">
                
            </div>
        </div>
    </form>
</div>