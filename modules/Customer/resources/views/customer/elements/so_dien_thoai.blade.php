@isset($customer)
    {!! Form::text('so_dien_thoai', $customer->so_dien_thoai, array('class' => 'form-control')); !!}
    {!! Form::label('so_dien_thoai', 'Số điện thoại'); !!}
    <x-input-error :messages="$errors->get('so_dien_thoai')" class="mt-2" />
@else
    {!! Form::text('so_dien_thoai', old('so_dien_thoai'), array('class' => 'form-control')); !!}
    {!! Form::label('so_dien_thoai', 'Số điện thoại *'); !!}
    <x-input-error :messages="$errors->get('so_dien_thoai')" class="mt-2" />
@endisset