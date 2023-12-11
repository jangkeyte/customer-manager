@if(isset($danh_sach_nhan_vien))
    {{-- Lấy được danh sách nhân viên --}}
    @if(isset($customer))
        {{-- Cập nhật Khách hàng sau bán | Admin --}}
        {!! Form::select('nhan_vien', $danh_sach_nhan_vien, $customer->nhan_vien, array('class' => 'form-select')); !!}
    @else        
        {{-- Thêm Khách hàng sau bán | Admin --}}
        {!! Form::select('nhan_vien', $danh_sach_nhan_vien, Auth::user()->ma_nhan_vien, array('class' => 'form-select')); !!}
    @endif
@else
    {{-- Không lấy được danh sách nhân viên --}}
    @if(isset($customer))
        {{-- Cập nhật Khách hàng trước bán | User --}}
        {!! Form::text('nhan_vien', old('nhan_vien', $customer->nhan_vien), array('class' => 'form-control')); !!}
    @else        
        {{-- Thêm Khách hàng trước bán | User --}}
        {!! Form::text('nhan_vien', old('nhan_vien', Auth::user()->ma_nhan_vien), array('class' => 'form-control')); !!}
    @endif
@endif

{!! Form::label('nhan_vien', 'Nhân viên'); !!}
<x-input-error :messages="$errors->get('nhan_vien')" class="mt-2" />