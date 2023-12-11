{!! Form::input('date', 'den_ngay', date('Y-m-d'), ['class' => 'form-control datepicker', 'data-date-format' => 'dd/mm/yyyy', 'step' => 'any']) !!}
{!! Form::label('den_ngay', 'Đến ngày', array('class' => 'form-label')); !!}
<x-input-error :messages="$errors->get('den_ngay')" class="mt-2" />  