<div class="form-group">
    {!! Form::label('password', 'Mật khẩu'); !!}
    {!! Form::password('password', array('class' => 'form-control input-sm', 'value' => '')); !!}
    @if($errors->has('password'))
        <div class="error">{{ $errors->first('password') }}</div>
    @endif
</div>