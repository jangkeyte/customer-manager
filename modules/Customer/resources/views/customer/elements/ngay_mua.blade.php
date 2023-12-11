@isset($customer)
    {!! Form::input('date', 'ngay_mua', $customer->ngay_mua, ['class' => 'form-control datepicker', 'data-date-format' => 'dd/mm/yyyy', 'step' => 'any']) !!}
    {!! Form::label('ngay_mua', 'Ngày mua', array('class' => 'form-label')); !!}
    <x-input-error :messages="$errors->get('ngay_mua')" class="mt-2" />
@else
    {!! Form::input('date', 'ngay_mua', date('Y-m-d'), ['class' => 'form-control datepicker', 'data-date-format' => 'dd/mm/yyyy', 'step' => 'any']) !!}
    {!! Form::label('ngay_mua', 'Ngày mua', array('class' => 'form-label')); !!}
    <x-input-error :messages="$errors->get('ngay_mua')" class="mt-2" />      
@endisset