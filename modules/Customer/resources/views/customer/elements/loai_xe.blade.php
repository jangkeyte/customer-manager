@if(isset($loai_xe))
    {{-- Lấy được thông tin loại xe --}}
    @if(isset($customer)) 
        {{-- Cập  nhật Khách hàng --}}
        @if($customer->loai_khach)
            {{-- Cập  nhật Khách hàng sau bán --}}
            {!! Form::text('loai_xe', $customer->loai_xe, array('class' => 'form-control')); !!}
        @else
            {{-- Cập nhật Khách hàng trước bán --}}
            {!! Form::select('loai_xe', $loai_xe, $customer->loai_xe, array('class' => 'form-control')); !!}
        @endif
    @else  
        @if(0)
            {{-- Thêm Khách hàng sau bán --}}
            {!! Form::text('loai_xe', old('loai_xe'), array('class' => 'form-control')); !!}
        @else
            {{-- Thêm Khách hàng trước bán --}}
            {!! Form::select('loai_xe', $loai_xe, '', array('class' => 'form-control')); !!}
        @endif
    @endif
@else
    {{-- Không lấy được thông tin loại xe --}}
    {!! Form::text('loai_xe', old('loai_xe', 'sprint-125'), array('class' => 'form-control')); !!}
@endif

{!! Form::label('loai_xe', 'Loại xe'); !!}
<x-input-error :messages="$errors->get('loai_xe')" class="mt-2" />