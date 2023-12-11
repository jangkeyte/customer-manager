@isset($thoi_gian)
<div class="col-md-1 form-floating mb-2">
    {!! Form::select('thoi_gian', $thoi_gian, 0, array('class' => 'form-select')); !!}
    {!! Form::label('thoi_gian', 'Trong tháng'); !!}
    <x-input-error :messages="$errors->get('thoi_gian')" class="mt-2" />
</div>
@endisset