<x-app-layout>
@if(isset($customer))
    @if((Auth::user()->haveRights('edit_customer_1') && $customer->loai_khach) || 
        (Auth::user()->haveRights('edit_customer_0') && !$customer->loai_khach))         
        <form method="POST" action="{{ route('customer_update') }}">
            @csrf
            <div class="container pt-2">
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

                    <!-- Nguồn -->
                    <div class="col-md-4 form-floating mb-3">
                        @include('customer.elements.nguon_khach')
                    </div>

                    <!-- Ngày mua -->
                    <div class="col-md-4 form-floating mb-3">
                        @if($customer->loai_khach)
                            @include('customer.elements.ngay_mua')
                        @else
                            @include('customer.elements.ngay_lien_he')
                        @endif
                    </div>

                    <!-- Loại xe -->
                    <div class="col-md-4 form-floating mb-3">
                        @include('customer.elements.loai_xe')
                    </div>

                    <!-- Màu xe -->
                    <div class="col-md-4 form-floating mb-3">
                        {!! Form::text('mau_xe', $customer->mau_xe, array('class' => 'form-control')); !!}
                        {!! Form::label('mau_xe', 'Màu xe'); !!}
                        <x-input-error :messages="$errors->get('mau_xe')" class="mt-2" />
                    </div>
                
                    @if($customer->loai_khach && Auth::user()->haveRights('edit_customer_1'))
                        <!-- Số khung -->
                        <div class="col-md-4 form-floating mb-3">
                            {!! Form::text('so_khung', $customer->so_khung, array('class' => 'form-control')); !!}
                            {!! Form::label('so_khung', 'Số khung'); !!}
                            <x-input-error :messages="$errors->get('so_khung')" class="mt-2" />
                        </div>

                        <!-- Số máy -->
                        <div class="col-md-4 form-floating mb-3">
                            {!! Form::text('so_may', $customer->so_may, array('class' => 'form-control')); !!}
                            {!! Form::label('so_may', 'Số máy'); !!}
                            <x-input-error :messages="$errors->get('so_may')" class="mt-2" />
                        </div>
                    @endif

                    <!-- Nhân viên -->
                    <div class="col-md-4 form-floating mb-3">
                        @include('customer.elements.nhan_vien')
                    </div>
                    
                    <!-- Cửa hàng -->
                    <div class="col-md-4 form-floating mb-3">
                        @include('customer.elements.cua_hang')
                    </div>

                    <!-- Ghi chú -->
                    <div class="col-md-4 form-floating mb-3">
                        @include('customer.elements.ghi_chu')
                    </div>

                    <!-- Tình trạng -->
                    <div class="col-md-4 form-floating mb-3">
                        
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-primary-button class="ml-4">
                            {{ __('Cập nhật') }}
                        </x-primary-button>
                    </div>
                </div>
            </div>
        </form>
    @else
        @include('layouts.err403')
    @endif
@else
    @include('layouts.err401', array('data' => 'Khách hàng'))
@endif
</x-app-layout>
