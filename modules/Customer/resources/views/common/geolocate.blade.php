<div class="form-group">
@if(isset($name))
    <div class="row">
        <div class="col-8">
            {!! Form::label($name, $label ?? ''); !!}
            {!! Form::text($name, isset($default) ? $default : '', array('class' => 'form-control input-sm')); !!}
        </div>
        <div class="col-4">
            {!! Form::label('', '_'); !!}
            {!! Form::button('<i class="fa fa-map-marker" aria-hidden="true"></i>', array('class' => 'form-control btn btn-primary', 'onclick' => 'getLocation()')); !!}
        </div>
    </div>
    @if($errors->has($name))
        <div class="error">{{ $errors->first($name) }}</div>
    @endif
@else
    {!! Form::label('', 'Không xác định', array('class' => 'text-danger')); !!}
    {!! Form::text('', '', array('class' => 'form-control input-sm', 'placeholder' => 'Lỗi dữ liệu: tên form không tồn tại.', 'disabled')); !!}
@endif
</div>