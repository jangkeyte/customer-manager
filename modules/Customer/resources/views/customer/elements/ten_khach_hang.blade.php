@isset($customer)
    {!! Form::text('ten_khach_hang', old('ten_khach_hang', $customer->ten_khach_hang), array('class' => 'form-control')); !!}
    {!! Form::label('ten_khach_hang', 'Tên Khách hàng'); !!}
    <x-input-error :messages="$errors->get('ten_khach_hang')" class="mt-2" />
@else
    {!! Form::text('ten_khach_hang', old('ten_khach_hang'), array('class' => 'form-control')); !!}
    {!! Form::label('ten_khach_hang', 'Tên Khách hàng *'); !!}
    <x-input-error :messages="$errors->get('ten_khach_hang')" class="mt-2" />
@endisset