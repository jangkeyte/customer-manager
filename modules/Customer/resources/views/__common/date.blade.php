@if(isset($name))
<div class="form-group">
    {!! Form::label($name, $label ?? ''); !!}
    {!! Form::date($name, old($name, date('Y-m-d', strtotime( $default ?? now() ))), array('id' => $name, 'class' => 'form-control', 'data-date-format' => 'DD/MM/YYYY')); !!}
    @if($errors->has($name))
        <div class="error">{{ $errors->first($name) }}</div>
    @endif
</div>
@endif

@push('scripts')
<script>

$("#{!! $name !!}").on("change", function() {
    this.setAttribute(
        "data-date",
        moment(this.value, "YYYY-MM-DD")
        .format( this.getAttribute("data-date-format") )
    )
}).trigger("change")

</script>
@endpush