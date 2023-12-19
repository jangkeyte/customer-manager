@if(isset($name))
    {!! Form::select($name, isset($data) ? $data : array('' => 'Tất cả'), old($name, isset($default) ? $default : ''), array('class' => 'form-control')); !!}
    {!! Form::label($name, $label ?? ''); !!}
    @if($errors->has($name))
        <div class="error">{{ $errors->first($name) }}</div>
    @endif
@else
    {!! Form::label('', 'Không xác định', array('class' => 'text-danger')); !!}
    {!! Form::text('', '', array('class' => 'form-control input-sm', 'placeholder' => 'Lỗi dữ liệu: tên form không tồn tại.', 'disabled')); !!}
@endif
