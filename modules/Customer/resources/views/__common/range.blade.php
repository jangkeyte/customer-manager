@if(isset($name))
<div class="form-group">
    {!! Form::label($name, $label ?? ''); !!}
    {!! Form::number($name, old($name, isset($default) ? $default : ''), ['min' => '0', 'step' => '0.1', 'class' => 'form-control']) !!}
    @if($errors->has($name))
        <div class="error">{{ $errors->first($name) }}</div>
    @endif
</div>
@else
    {!! Form::label('', 'Không xác định', array('class' => 'text-danger')); !!}
    {!! Form::text('', '', array('class' => 'form-control input-sm', 'placeholder' => 'Lỗi dữ liệu: tên form không tồn tại.', 'disabled')); !!}
@endif