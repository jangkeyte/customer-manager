@if(isset($name))
    @empty($hidden)
        {!! Form::label($name, $label ?? ''); !!}
    @endempty
    {!! Form::password($name, array('class' => 'form-control input-sm', 'id' => $name, 'placeholder' => 'Nhập ' . ($label ?? ''), $required ?? '', $hidden ?? '')); !!}
    @if($errors->has($name))
        <div class="error">{{ $errors->first($name) }}</div>
    @endif
@else
    {!! Form::password('', 'Không xác định', array('class' => 'text-danger')); !!}
    {!! Form::text('', '', array('class' => 'form-control input-sm')); !!}
@endif