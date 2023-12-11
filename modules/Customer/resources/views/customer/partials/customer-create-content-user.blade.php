<form method="POST" action="{{ route('customer_add') }}">
    @csrf
    <div class="container-fluid pt-2">
        <div class="row g-2">

            <!-- Tên khách hàng -->
            <div class="col-md-4 form-floating mb-3">
                @include('customer.elements.ten_khach_hang')
            </div>

            <!-- Giới tính -->
            <div class="col-md-2 col-8 mb-3">
                @include('customer.elements.gioi_tinh')
            </div>

            <!-- Địa chỉ -->
            <div class="col-md-2 col-4 form-floating mb-3">
                @include('customer.elements.dia_chi')                    
            </div>

            <!-- Số điện thoại -->
            <div class="col-md-4 form-floating mb-3">
                @include('customer.elements.so_dien_thoai')    
            </div>

            <!-- Nguồn khách -->
            <div class="col-md-2 col-8 form-floating mb-3">
                @include('customer.elements.nguon_khach')
            </div>

            <!-- Kênh liên hệ -->
            <div class="col-md-2 col-4 form-floating mb-3">
                @include('customer.elements.kenh_lien_he')
            </div>

            <!-- Loại Khách hàng --> 
            <div class="col-md-4 form-floating mb-3 hidden">
                @include('customer.elements.loai_khach_hang')
            </div>

            <!-- Ngày liên hệ -->
            <div class="col-md-4 form-floating mb-3">
                @include('customer.elements.ngay_lien_he')                        
            </div>

            <!-- Loại xe -->
            <div class="col-md-4 form-floating mb-3">
                @include('customer.elements.loai_xe')
            </div>

            <!-- Nhân viên -->
            <div class="col-md-4 form-floating mb-3">
                @include('customer.elements.nhan_vien')
            </div>

            <!-- Cửa hàng -->
            <div class="col-md-4 form-floating mb-3">
                @include('customer.elements.cua_hang')
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-4">
                    {{ __('Tạo mới') }}
                </x-primary-button>
            </div>
        </div>
    </div>
</form>