@if(isset($name))
    {{ html()->hidden($name)->value(old($name) ?? $value) }} 
@else
    {{ html()->hidden()->value('Lỗi dữ liệu: tên input form không tồn tại.') }}
@endif