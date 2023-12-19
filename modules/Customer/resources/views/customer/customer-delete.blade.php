@extends('Customer::master')

@section('title', 'Cập nhật thông tin khách hàng')

@section('entry_content')

    @if(isset($customer))
    
        @if(auth()->user()->can('delete-customer'))
            
            {{ html()->form('POST')->route('remove.' . substr(Route::current()->getPrefix(), 1))->open() }}
                @csrf
                <div class="container pt-2">
                    <div class="row g-2">
                        <div class="alert alert-danger" role="alert">
                            Xác nhận xóa Khách hàng này, <strong>Khách hàng một khi đã xóa không thể phục hồi lại, vui lòng suy nghĩ thật kỹ trước khi xóa!!!</strong>
                        </div>

                        <!-- Mã khách hàng -->
                        <div class="col-4 form-floating mb-3 hidden">
                            <x-jangkeyte::forms.text name="ma_khach_hang" label="Mã Khách hàng" :value="$customer->ma_khach_hang" disabled="disabled" />
                        </div>

                        <!-- Tên khách hàng -->
                        <div class="col-4 form-floating mb-3">
                            <x-jangkeyte::forms.text name="ten_khach_hang" label="Tên Khách hàng" :value="$customer->ten_khach_hang" disabled="disabled" />
                        </div>

                        <!-- Số điện thoại -->
                        <div class="col-4 form-floating mb-3">
                            <x-jangkeyte::forms.text name="so_dien_thoai" label="Số điện thoại" :value="$customer->so_dien_thoai" disabled="disabled" />
                        </div>

                        <!-- Nguồn -->
                        <div class="col-4 form-floating mb-3">
                            <x-jangkeyte::forms.text name="nguon" label="Nguồn" :value="$customer->source->name" disabled="disabled" />
                        </div>

                        <!-- Nhân viên -->
                        <div class="col-md-4 form-floating mb-3">
                            <x-jangkeyte::forms.text name="ten_nhan_vien" label="Nhân viên" :value="$customer->staff->ten_nhan_vien" disabled="disabled" />
                        </div>
                        
                        <!-- Cửa hàng -->
                        <div class="col-md-4 form-floating mb-3">
                            <x-jangkeyte::forms.text name="cua_hang" label="Cửa hàng" :value="$customer->store->name" disabled="disabled" />
                        </div>

                        <!-- Tình trạng -->
                        <div class="col-md-4 form-floating mb-3">
                            <x-jangkeyte::forms.text name="tinh_trang" label="Tình trạng" :value="$customer->status->name" disabled="disabled" />
                        </div>

                        <!-- Ghi chú -->
                        <div class="col-md-8 form-floating mb-3">
                            <x-jangkeyte::forms.text name="ghi_chu" label="Ghi chú" :value="$customer->ghi_chu" disabled="disabled" />
                        </div>

                        @if(auth()->user()->can('delete-customer'))
                        <div class="col-md-12 form-floating mb-3">
                            <x-jangkeyte::forms.button text="Xóa khách hàng" icon="fa fa-trash" class="btn btn-sm btn-danger" />
                        </div>
                        @endif

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