@if(isset($name))
<div class="form-group">
    {!! Form::label($name, $label ?? ''); !!}
    {!! Form::select($name, isset($data) ? $data : array('' => 'Tất cả'), old($name, isset($default) ? $default : ''), array('class' => 'form-control')); !!}
    @if($errors->has($name))
        <div class="error">{{ $errors->first($name) }}</div>
    @endif
</div>
@else
    {!! Form::label('', 'Không xác định', array('class' => 'text-danger')); !!}
    {!! Form::text('', '', array('class' => 'form-control input-sm', 'placeholder' => 'Lỗi dữ liệu: tên form không tồn tại.', 'disabled')); !!}
@endif
