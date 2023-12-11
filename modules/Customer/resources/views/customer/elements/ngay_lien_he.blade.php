@isset($customer)
    {!! Form::input('datetime-local', 'ngay_lien_he', $customer->ngay_lien_he, ['id' => 'ngay_lien_he', 'class' => 'form-control datepicker', 'step' => 'any', 'data-date-format' => 'dd/mm/yyyy']) !!}
    {!! Form::label('ngay_lien_he', 'Ngày liên hệ', array('class' => 'form-label')); !!}
    <x-input-error :messages="$errors->get('ngay_lien_he')" class="mt-2" />
@else
    {!! Form::input('datetime-local', 'ngay_lien_he', date('Y-m-d H:i:s'), ['id' => 'ngay_lien_he', 'class' => 'form-control datepicker', 'step' => 'any', 'data-date-format' => 'dd/mm/yyyy']) !!}
    {!! Form::label('ngay_lien_he', 'Ngày liên hệ', array('class' => 'form-label')); !!}
    <x-input-error :messages="$errors->get('ngay_lien_he')" class="mt-2" />
@endisset