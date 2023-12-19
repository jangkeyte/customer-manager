@if(isset($name))
<div class="form-group">
    <div class="row">
        <div class="col-12">
        {!! Form::label($name, $label ?? ''); !!}
        {!! Form::file($name, array('class' => 'form-control d-none', 'onchange' => 'readURL(this)')); !!}
        <a class="btn btn-light d-block" onclick="document.getElementById('image').click()">Chọn {!! $label ?? 'hình ảnh' !!}</a>
        @if($errors->has($name))
            <div class="error">{{ $errors->first($name) }}</div>
        @endif
        </div>
    </div>
</div>
@else
    {!! Form::label('', 'Không xác định tên', array('class' => 'text-danger')); !!}
    {!! Form::text('', '', array('class' => 'form-control input-sm', 'placeholder' => 'Lỗi: tên trường dữ liệu không tồn tại.', 'disabled')); !!}
@endif

@push('scripts')
<script>
function readURL(input) {
    var url = input.value;
    var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
    if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#demo').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    } else {
        alert("Hình ảnh không hợp lệ, chỉ chấp nhận định dạng png, jpg, jpeg!!!");
    }
}
</script>
@endpush