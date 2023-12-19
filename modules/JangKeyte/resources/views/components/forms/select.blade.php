@if(isset($name))
<div class="input-group has-validation">
    @isset($icon)
        {{ html()->label("<i class='" . $icon . "'></i>")->for($name)->class('input-group-text') }}  
    @endisset
    <div class="form-floating is-invalid">
        {{ html()->select($name)->options($options ?? array( '' => 'Tất cả' ))->value(old( $name ) ?? $value )->class('form-select')->disabled($disabled) }}
        {{ html()->label($label ?? '')->for($name) }}  
    </div>
    @if($errors->has($name))
        {{ html()->div($errors->first($name)->class('invalid-feedback')) }}
    @endif
</div>
@else
    {{ html()->text()->class('form-control input-sm text-danger')->value('Lỗi dữ liệu: tên input form không tồn tại.') }}
    {{ html()->label('Không xác định') }}
@endif