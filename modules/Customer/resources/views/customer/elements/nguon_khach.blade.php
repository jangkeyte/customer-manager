
@if(isset($customer))
    @if(isset($nguon_khach))
        {!! Form::select('nguon_khach', $nguon_khach, $customer->nguon_khach, array('class' => 'form-select')); !!}
    @else 
        {!! Form::select('nguon_khach', array('0' => 'Không có dữ liệu'), 0, array('class' => 'form-select')); !!}
    @endif
@else
    @if(isset($nguon_khach))
        {!! Form::select('nguon_khach', $nguon_khach, 1, array('class' => 'form-select')); !!}
    @else 
        {!! Form::select('nguon_khach', array('0' => 'Không có dữ liệu'), 0, array('class' => 'form-select')); !!}
    @endif
@endif
{!! Form::label('nguon_khach', 'Nguồn'); !!}
<x-input-error :messages="$errors->get('nguon_khach')" class="mt-2" />