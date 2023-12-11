{!! Form::input('date', 'tu_ngay', date('2023-02-01'), ['class' => 'form-control datepicker', 'data-date-format' => 'dd/mm/yyyy', 'step' => 'any']) !!}
{!! Form::label('tu_ngay', 'Từ ngày', array('class' => 'form-label')); !!}
<x-input-error :messages="$errors->get('tu_ngay')" class="mt-2" />  