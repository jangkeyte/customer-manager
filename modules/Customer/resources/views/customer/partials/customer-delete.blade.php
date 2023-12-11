<x-app-layout>
    @if(Auth::user()->haveRights('delete_customer'))
    <form method="POST" action="{{ route('customer_delete') }}">
        @csrf
        <div class="container pt-2">
            <div class="row g-2">
                <div class="alert alert-danger" role="alert">
                    Xác nhận xóa Khách hàng này, <strong>Khách hàng một khi đã xóa không thể phục hồi lại, vui lòng suy nghĩ thật kỹ trước khi xóa!!!</strong>
                </div>

                <!-- Mã khách hàng -->
                <div class="col-4 form-floating mb-3 hidden">
                    {!! Form::text('ma_khach_hang', old('ma_khach_hang', $customer->ma_khach_hang), array('class' => 'form-control')); !!}
                    {!! Form::label('ma_khach_hang', 'Mã Khách hàng'); !!}
                    <x-input-error :messages="$errors->get('ma_khach_hang')" class="mt-2" />
                </div>

                <!-- Tên khách hàng -->
                <div class="col-4 form-floating mb-3">
                    {!! Form::text('ten_khach_hang', old('ten_khach_hang', $customer->ten_khach_hang), array('class' => 'form-control', 'disabled')); !!}
                    {!! Form::label('ten_khach_hang', 'Tên Khách hàng'); !!}
                    <x-input-error :messages="$errors->get('ten_khach_hang')" class="mt-2" />
                </div>

                <!-- Số điện thoại -->
                <div class="col-4 form-floating mb-3">
                    {!! Form::text('so_dien_thoai', $customer->so_dien_thoai, array('class' => 'form-control', 'disabled')); !!}
                    {!! Form::label('so_dien_thoai', 'Số điện thoại'); !!}
                    <x-input-error :messages="$errors->get('so_dien_thoai')" class="mt-2" />
                </div>

                <!-- Nguồn -->
                <div class="col-4 form-floating mb-3">
                    {!! Form::text('nguon', $customer->source->name, array('class' => 'form-control', 'disabled')); !!}
                    {!! Form::label('nguon', 'Nguồn'); !!}
                    <x-input-error :messages="$errors->get('nguon')" class="mt-2" />
                </div>

                <!-- Nhân viên -->
                <div class="col-md-4 form-floating mb-3">
                    {!! Form::text('nhan_vien', $customer->user->name, array('class' => 'form-control', 'disabled')); !!}
                    {!! Form::label('nhan_vien', 'Nhân viên'); !!}
                    <x-input-error :messages="$errors->get('nhan_vien')" class="mt-2" />
                </div>
                
                <!-- Cửa hàng -->
                <div class="col-md-4 form-floating mb-3">
                    {!! Form::text('cua_hang', $customer->store->name, array('class' => 'form-control', 'disabled')); !!}
                    {!! Form::label('cua_hang', 'Cửa hàng'); !!}
                    <x-input-error :messages="$errors->get('cua_hang')" class="mt-2" />
                </div>

                <!-- Tình trạng -->
                <div class="col-md-4 form-floating mb-3">
                    {!! Form::text('tinh_trang', $customer->status->name, array('class' => 'form-control', 'disabled')); !!}
                    {!! Form::label('tinh_trang', 'Tình trạng'); !!}
                    <x-input-error :messages="$errors->get('cua_hang')" class="mt-2" />
                </div>

                <!-- Ghi chú -->
                <div class="col-md-12 form-floating mb-3">
                    {!! Form::text('ghi_chu', $customer->ghi_chu, array('class' => 'form-control', 'disabled')); !!}
                    {!! Form::label('ghi_chu', 'Ghi chú'); !!}
                    <x-input-error :messages="$errors->get('ghi_chu')" class="mt-2" />
                </div>

                @if(Auth::user()->isAdmin())
                <div class="col-md-12 form-floating mb-3">
                    <x-primary-button class="ml-4">
                        {{ __('Xóa Khách hàng') }}
                    </x-primary-button>
                </div>
                @endif

            </div>
        </div>
    </form>
    @else
        @include('customer.elements.khong_du_quyen')
    @endif
</x-app-layout>