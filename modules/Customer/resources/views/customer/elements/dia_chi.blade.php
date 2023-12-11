@isset($customers))
    {!! Form::select('dia_chi', $tinh_thanh, !empty($customer->province) && $customer->province->id != 0 ? $customer->province->name : $customer->dia_chi, array('class' => 'form-select')); !!}
    {!! Form::label('dia_chi', 'Địa chỉ'); !!}
    <x-input-error :messages="$errors->get('dia_chi')" class="mt-2" />
@else
    {!! Form::select('dia_chi', $tinh_thanh, 1, array('class' => 'form-select')); !!}
    {!! Form::label('dia_chi', 'Địa chỉ'); !!}
    <x-input-error :messages="$errors->get('loai_khach_hang')" class="mt-2" />
@endisset