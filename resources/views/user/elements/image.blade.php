<div class="form-group">
    <div class="row">
        <div class="col-12">
        {!! Form::label('image', 'Hình ảnh'); !!}
        {!! Form::file('image', array('class' => 'form-control d-none', 'onchange' => 'readURL(this)')); !!}
        <a class="btn btn-light d-block" onclick="document.getElementById('image').click()">Chọn hình ảnh</a>
        @if($errors->has('image'))
            <div class="error">{{ $errors->first('image') }}</div>
        @endif
        </div>
    </div>
</div>

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