<div class="ms-2 mt-2 form-check form-check-inline form-switch">
    {!! Form::radio('gioi_tinh', 1, true, array('id' => 'gioi_tinh_nam', 'class' => 'form-check-input')); !!}
    {!! Form::label('gioi_tinh_nam', 'Nam', array('class' => 'form-check-label')); !!}
</div>
<div class="form-check form-check-inline form-switch">
    {!! Form::radio('gioi_tinh', 0, false, array('id' => 'gioi_tinh_nu', 'class' => 'form-check-input')); !!}
    {!! Form::label('gioi_tinh_nu', 'Nữ', array('class' => 'form-check-label')); !!}
</div>
<x-input-error :messages="$errors->get('gioi_tinh')" class="mt-2" />