<form method="POST" action="{{ route('customer_add') }}">
    @csrf
    <div class="container-fluid pt-2">
        <div class="row g-2">

            <!-- Mã khách hàng -->
            <div class="col-md-4 form-floating mb-3">  
                @include('customer.elements.ma_khach_hang')
            </div>

            <!-- Tên khách hàng -->
            <div class="col-md-4 form-floating mb-3">
                @include('customer.elements.ten_khach_hang')
            </div>

            <!-- Giới tính -->
            <div class="col-md-4 mb-3">
                @include('customer.elements.gioi_tinh')
            </div>

            <!-- Địa chỉ -->
            <div class="col-md-4 form-floating mb-3">
                @include('customer.elements.dia_chi')
            </div>

            <!-- Số điện thoại -->
            <div class="col-md-4 form-floating mb-3">
                @include('customer.elements.so_dien_thoai')    
            </div>

            <!-- Nguồn khách -->
            <div class="col-md-4 form-floating mb-3">
                @include('customer.elements.nguon_khach')
            </div>

            <!-- Loại Khách hàng --> 
            <div class="col-md-4 form-floating mb-3 hidden">
                @include('customer.elements.loai_khach_hang')                    
            </div>

            <!-- Ngày mua -->
            <div class="col-md-4 form-floating mb-3">
                @include('customer.elements.ngay_mua')                
            </div>

            <!-- Loại xe -->
            <div class="col-md-4 form-floating mb-3">
                @include('customer.elements.loai_xe')
            </div>

            <!-- Màu xe -->
            <div class="col-md-4 form-floating mb-3">
                {!! Form::text('mau_xe', old('mau_xe'), array('class' => 'form-control')); !!}
                {!! Form::label('mau_xe', 'Màu xe'); !!}
                <x-input-error :messages="$errors->get('mau_xe')" class="mt-2" />
            </div>

            <!-- Số khung -->
            <div class="col-md-4 form-floating mb-3">
                {!! Form::text('so_khung', old('so_khung'), array('class' => 'form-control')); !!}
                {!! Form::label('so_khung', 'Số khung'); !!}
                <x-input-error :messages="$errors->get('so_khung')" class="mt-2" />
            </div>

            <!-- Số máy -->
            <div class="col-md-4 form-floating mb-3">
                {!! Form::text('so_may', old('so_may'), array('class' => 'form-control')); !!}
                {!! Form::label('so_may', 'Số máy'); !!}
                <x-input-error :messages="$errors->get('so_may')" class="mt-2" />
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