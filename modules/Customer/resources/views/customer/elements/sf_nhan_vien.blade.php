@if(isset($cua_hang) && (Auth::user()->haveRights(array('list_customer_area', 'find_customer_area', 'list_customer_local', 'list_customer_local'))))
<div class="col-md-1 form-floating mb-2">
    {!! Form::select('nhan_vien', $nhan_vien, old('nhan_vien'), array('class' => 'form-select')); !!}
    {!! Form::label('nhan_vien', 'Nhân viên'); !!}
    <x-input-error :messages="$errors->get('nhan_vien')" class="mt-2" />
</div>
@else            
<div class="col-md-1 form-floating mb-2 hidden">
    {!! Form::text('nhan_vien', old('nhan_vien', Auth::user()->ma_nhan_vien), array('class' => 'form-control')); !!}
    {!! Form::label('nhan_vien', 'Cửa hàng'); !!}
    <x-input-error :messages="$errors->get('nhan_vien')" class="mt-2" />
</div>
@endisset