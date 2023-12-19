<div class="form-group">
    {!! Form::label('name', 'Họ và tên'); !!}
    {!! Form::text('name', isset($default) ? $default : '', array('class' => 'form-control input-sm', 'placeholder' => 'Nhập họ tên')); !!}
    @if($errors->has('name'))
        <div class="error">{{ $errors->first('name') }}</div>
    @endif
</div>