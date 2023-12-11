{!! Form::select('sap_xep_theo', array('asc' => 'Tăng dần', 'desc' => 'Giảm dần'), 'desc', array('class' => 'form-select')); !!}
{!! Form::label('sap_xep_theo', 'Chiều hướng'); !!}
<x-input-error :messages="$errors->get('sap_xep_theo')" class="mt-2" />