<div class="col-md-12 form-floating mb-3">
    {!! Form::text('keyword', old('keyword'), array('class' => 'form-control')); !!}
    {!! Form::label('keyword', 'Từ khóa'); !!}
    <x-input-error :messages="$errors->get('keyword')" class="mt-2" />
</div>