@isset($customer)
    {!! Form::text('ma_khach_hang', old('ma_khach_hang', $customer->ma_khach_hang), array('class' => 'form-control')); !!}
    {!! Form::label('ma_khach_hang', 'Mã Khách hàng'); !!}
    <x-input-error :messages="$errors->get('ma_khach_hang')" class="mt-2" />
@else
    {!! Form::text('ma_khach_hang', old('ma_khach_hang'), array('class' => 'form-control')); !!}
    {!! Form::label('ma_khach_hang', 'Mã Khách hàng'); !!}
    <x-input-error :messages="$errors->get('ma_khach_hang')" class="mt-2" />
@endisset