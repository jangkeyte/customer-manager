@isset($tinh_trang)
<div class="col-md-1 form-floating mb-3">
    {!! Form::select('tinh_trang', $tinh_trang, 0, array('class' => 'form-select')); !!}
    {!! Form::label('tinh_trang', 'Tình trạng'); !!}
    <x-input-error :messages="$errors->get('tinh_trang')" class="mt-2" />
</div>
@endisset