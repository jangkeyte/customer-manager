@if(Auth::user()->isAdmin()) 
    {!! Form::select('loai_khach_hang', array(0 => 'Trước bán', 1 => 'Sau bán'), 1, array('class' => 'form-select')); !!}
    {!! Form::label('loai_khach_hang', 'Loại Khách hàng'); !!}
    <x-input-error :messages="$errors->get('loai_khach_hang')" class="mt-2" />
@else
    {!! Form::select('loai_khach_hang', array(0 => 'Trước bán', 1 => 'Sau bán'), 0, array('class' => 'form-select')); !!}
    {!! Form::label('loai_khach_hang', 'Loại Khách hàng'); !!}
    <x-input-error :messages="$errors->get('loai_khach_hang')" class="mt-2" />
@endif