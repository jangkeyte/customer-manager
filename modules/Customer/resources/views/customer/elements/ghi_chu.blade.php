{!! Form::text('ghi_chu', $customer->ghi_chu, array('class' => 'form-control')); !!}
{!! Form::label('ghi_chu', 'Ghi chú'); !!}
<x-input-error :messages="$errors->get('ghi_chu')" class="mt-2" />