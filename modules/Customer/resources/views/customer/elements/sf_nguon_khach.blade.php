@isset($nguon_khach)
<div class="col-md-1 form-floating mb-3">
    {!! Form::select('nguon_khach', $nguon_khach, 0, array('class' => 'form-select')); !!}
    {!! Form::label('nguon_khach', 'Nguồn khách'); !!}
    <x-input-error :messages="$errors->get('nguon_khach')" class="mt-2" />
</div>
@endisset