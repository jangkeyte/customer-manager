@if(isset($name))
    {{ html()->datetime($name, now())->class('form-control')->value(old($name) ?? ($value ?? date('Y-m-d h:i:s', strtotime(now())))) }}
    {!! Form::label($name, $label ?? ''); !!}
    @if($errors->has($name))
        {{ html()->div($errors->first($name))->class('text-danger') }}
    @endif
@endif