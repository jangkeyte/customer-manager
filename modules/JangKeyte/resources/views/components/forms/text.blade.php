@if(isset($name))
<div class="input-group has-validation">
    @isset($icon)
        <span class="input-group-text"><i class="{{ $icon }}"></i></span>
    @endisset
    <div class="form-floating is-invalid">
        {{ html()->text($name)->class('form-control input-sm' . ($errors->has($name) ? ' is-invalid' : ''))->value(old($name) ?? $value)->placeholder('Nhập ' . ($label ?? ''))->required($required)->disabled($disabled)->autofocus($autofocus) }}
        {{ html()->label(isset($label) ? $label . (isset($required) ? ' *' : '' ) : '')->for($name) }}          
    </div>  
    @if($errors->has($name))
        {{ html()->div($errors->first($name))->class('invalid-feedback') }}
    @endif
</div>
@else
    {{ html()->text()->class('form-control input-sm text-danger')->value('Lỗi dữ liệu: tên input form không tồn tại.') }}
    {{ html()->label('Không xác định') }}
@endif