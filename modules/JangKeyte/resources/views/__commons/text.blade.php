@if(isset($name))
    {{ html()->text($name)->class('form-control input-sm')->placeholder('Nhập ' . ($label ?? '')) }}
    {{ html()->label(isset($label) ? $label . (isset($required) ? ' *' : '' ) : '') }}    
    @if($errors->has($name))
        {{ html()->div($errors->first($name))->class('error') }}
        <div class="error">{{ $errors->first($name) }}</div>
    @endif
@else
    {{ html()->text()->class('form-control input-sm text-danger')->value('Lỗi dữ liệu: tên input form không tồn tại.') }}
    {{ html()->label('Không xác định') }}
@endif