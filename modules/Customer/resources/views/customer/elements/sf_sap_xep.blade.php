{!! Form::select('sap_xep', array('cua_hang' => 'Cửa hàng', 'nhan_vien' => 'Nhân viên', 'nguon_khach' => 'Nguồn khách', 'tinh_trang' => 'Tình trạng', 'thoi_gian' => 'Thời gian'), 'thoi_gian', array('class' => 'form-select')); !!}
{!! Form::label('sap_xep', 'Sắp xếp theo'); !!}
<x-input-error :messages="$errors->get('sap_xep')" class="mt-2" />