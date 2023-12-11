<div class="form-group">
    {!! Form::label('email', 'Địa chỉ email'); !!}
    {!! Form::email('email', isset($default) ? $default : '', array('class' => 'form-control input-sm', 'placeholder' => 'Nhập địa chỉ email')); !!}
    @if($errors->has('email'))
        <div class="error">{{ $errors->first('email') }}</div>
    @endif
</div>