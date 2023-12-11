
@if(isset($customer))
    @if(isset($kenh_lien_he))
        {!! Form::select('kenh_lien_he', $kenh_lien_he, $customer->kenh_lien_he, array('class' => 'form-select')); !!}
    @else 
        {!! Form::select('kenh_lien_he', array('0' => 'Không có dữ liệu'), 0, array('class' => 'form-select')); !!}
    @endif
@else
    @if(isset($kenh_lien_he))
        {!! Form::select('kenh_lien_he', $kenh_lien_he, 1, array('class' => 'form-select')); !!}
    @else 
        {!! Form::select('kenh_lien_he', array('0' => 'Không có dữ liệu'), 0, array('class' => 'form-select')); !!}
    @endif
@endif
{!! Form::label('kenh_lien_he', 'Kênh liên hệ'); !!}
<x-input-error :messages="$errors->get('kenh_lien_he')" class="mt-2" />