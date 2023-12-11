{!! Form::select('tinh_trang', array(1 => '1.1 - Chưa gọi', 2 => '1.2 - Chưa liên hệ', 3 => '2.1 - Tham khảo', 4 => '2.2 - Sẽ mua', 5 => '2.3 - Đã cọc', 6 => '3.1 - Đã mua', 7 => '3.2 - Không mua'), $customer->tinh_trang, array('class' => 'form-select')); !!}
{!! Form::label('tinh_trang', 'Tình trạng'); !!}
<x-input-error :messages="$errors->get('cua_hang')" class="mt-2" />