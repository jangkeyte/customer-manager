@if(isset($name))
    {{ html()->datetime($name, now())->class('form-control')->value(old($name) ?? $value) }}
    {!! Form::label($name, $label ?? ''); !!}
    @if($errors->has($name))
        {{ html()->div($errors->first($name))->class('text-danger') }}
    @endif
@endif