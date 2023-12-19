@if(isset($name))
    {{ html()->datetime($name, now())->class('form-control') }}
    {!! Form::label($name, $label ?? ''); !!}
    @if($errors->has($name))
        <div class="error">{{ $errors->first($name) }}</div>
    @endif
@endif