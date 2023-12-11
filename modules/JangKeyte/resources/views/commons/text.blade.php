@if(isset($name))
    @empty($hidden)
    {!! Form::label($name, $label ?? ''); !!}
    @endempty
    {!! Form::text($name, isset($default) ? $default : '', array('class' => 'form-control input-sm', 'id' => $name, 'placeholder' => 'Nhập ' . ($label ?? ''), $required ?? '', $hidden ?? '')); !!}
    @if($errors->has($name))
        <div class="error">{{ $errors->first($name) }}</div>
    @endif
@else
    {!! Form::label('', 'Không xác định', array('class' => 'text-danger')); !!}
    {!! Form::text('', '', array('class' => 'form-control input-sm', 'placeholder' => 'Lỗi dữ liệu: tên form không tồn tại.', 'disabled')); !!}
@endif