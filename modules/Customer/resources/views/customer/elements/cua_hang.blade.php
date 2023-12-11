@if(isset($cua_hang))
    @if(isset($customer))
        {{-- Cập nhật Khách hàng --}}
        {!! Form::select('cua_hang', $cua_hang, $customer->cua_hang, array('class' => 'form-select')); !!}
    @else
        {{-- Thêm Khách hàng --}}
        {!! Form::select('cua_hang', $cua_hang, Auth::user()->showroom, array('class' => 'form-select')); !!}
    @endif
@else
    @if(isset($customer))
        {{-- Cập nhật Khách hàng --}}
        {!! Form::select('cua_hang', $opt_cua_hang, $customer->cua_hang, array('class' => 'form-select')); !!}
    @else
        {{-- Thêm Khách hàng --}}
        {!! Form::select('cua_hang', $opt_cua_hang, Auth::user()->showroom, array('class' => 'form-select')); !!}
    @endif
@endif
{!! Form::label('cua_hang', 'Cửa hàng'); !!}
<x-input-error :messages="$errors->get('cua_hang')" class="mt-2" />
