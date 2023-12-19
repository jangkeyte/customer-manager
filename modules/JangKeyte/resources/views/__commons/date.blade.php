@if(isset($name))
    {!! Form::date($name, old($name, date('Y-m-d', strtotime( $default ?? now() ))), array('id' => $name, 'class' => 'form-control', 'data-date-format' => 'DD/MM/YYYY')); !!}
    {!! Form::label($name, $label ?? ''); !!}
    @if($errors->has($name))
        <div class="error">{{ $errors->first($name) }}</div>
    @endif
@endif