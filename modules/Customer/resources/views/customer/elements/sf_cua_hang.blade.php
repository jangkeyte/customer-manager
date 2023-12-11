@if(isset($cua_hang) && (Auth::user()->haveRights(array('list_customer_area', 'find_customer_area'))))
<div class="col-md-1 form-floating mb-2">
    {!! Form::select('cua_hang', $cua_hang, 0, array('class' => 'form-select')); !!}
    {!! Form::label('cua_hang', 'Cửa hàng'); !!}
    <x-input-error :messages="$errors->get('cua_hang')" class="mt-2" />
</div>
@else
<div class="col-md-1 form-floating mb-2 hidden">
    {!! Form::text('cua_hang', old('cua_hang', Auth::user()->showroom), array('class' => 'form-control')); !!}
    {!! Form::label('cua_hang', 'Cửa hàng'); !!}
    <x-input-error :messages="$errors->get('cua_hang')" class="mt-2" />
</div>
@endisset