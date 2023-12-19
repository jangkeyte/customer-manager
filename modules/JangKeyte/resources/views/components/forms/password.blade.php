@if(isset($name))
    {!! Form::password($name, array('class' => 'form-control input-sm', 'id' => $name, 'placeholder' => 'Nhập ' . ($label ?? ''), $required ?? '', $hidden ?? '')); !!} 
    @empty($hidden)
        {!! Form::label($name, $label ?? ''); !!}
    @endempty
    @if($errors->has($name))
        {{ html()->div($errors->first($name))->class('text-danger') }}
    @endif
@else
    {!! Form::password('', 'Không xác định', array('class' => 'text-danger')); !!}
    {!! Form::text('', '', array('class' => 'form-control input-sm')); !!}
@endif