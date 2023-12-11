<x-app-layout>
    <form method="POST" action="{{ route('carelog_add') }}">
        @csrf
        <div class="container pt-2">
            <div class="row g-2">
                <p class="fs-4">Thông tin chăm sóc Khách hàng </br><span class="fw-bold">{!! $khach_hang->ten_khach_hang !!}</span> | <span class="fs-5">{!! $khach_hang->so_dien_thoai !!}</span></p>

                <!-- Tình trạng -->
                <div class="col-md-4 form-floating mb-3">
                    {!! Form::select('tinh_trang', array(1 => '1.1 - Chưa gọi', 2 => '1.2 - Chưa liên lạc được', 3 => '2.1 - Tham khảo', 4 => '2.2 - Sẽ mua', 5 => '2.3 - Đã cọc', 6 => '3.1 - Đã mua', 7 => '3.2 - Không mua'), $khach_hang->tinh_trang, array('class' => 'form-select')); !!}
                    {!! Form::label('tinh_trang', 'Tình trạng'); !!}
                    <x-input-error :messages="$errors->get('cua_hang')" class="mt-2" />
                </div>

                <!-- Khách hàng -->
                <div class="col-md-12 form-floating mb-3 hidden">
                    {!! Form::text('khach_hang', $khach_hang->ma_khach_hang, array('class' => 'form-control')); !!}
                </div>

                <!-- Loại Khách hàng -->
                <div class="col-md-12 form-floating mb-3 hidden">
                    {!! Form::text('loai_khach_hang', $khach_hang->loai_khach, array('class' => 'form-control')); !!}
                </div>

                @if($khach_hang->carelogs->count() < 5)                
                    <!-- Nội dung -->
                    <div class="col-md-8 form-floating mb-3">
                        {!! Form::text('noi_dung', old('noi_dung'), array('class' => 'form-control')); !!}
                        {!! Form::label('noi_dung', 'Nội dung'); !!}
                        @if($errors->has('noi_dung')) <div class="error-message">{{ $errors->first('noi_dung') }}</div> @endif 
                    </div>
                @else                    
                <div class="alert alert-primary" role="alert">
                    Đã chăm sóc Khách hàng đủ 5 lần theo quy định.
                </div>
                @endif

                @isset($khach_hang->carelogs)
                    @foreach($khach_hang->carelogs as $carelog) 
                    <div class="col-md-12 form-floating mb-3">
                        {!! Form::text('noi_dung_cham_soc', $carelog->noi_dung, array('class' => 'form-control', 'disabled' => 'disabled')); !!}
                        {!! Form::label('noi_dung_cham_soc', 'Lần ' . $loop->index + 1 . ' | ' . $carelog->status->name . ' | ' . date("d/m/Y - h:m:s",  strtotime($carelog->ngay_thuc_hien))); !!}
                    </div>
                    @endforeach
                @endisset

                <div class="col-md-12 form-floating mb-3">
                    {!! Form::text('ghi_chu', $khach_hang->ghi_chu, array('class' => 'form-control', 'disabled' => 'disabled')); !!}
                    {!! Form::label('ghi_chu', 'Ghi chú'); !!}
                </div>

                <div class="flex items-center justify-end mt-4">
                <a class="btn btn-dark bg-dark" href="{!! route('thongtinkhachhang', $khach_hang->ma_khach_hang ) !!}" role="button">Xem thông tin</a>
                &nbsp;
                @if($khach_hang->carelogs->count() < 5) 
                    {!! Form::submit('Xác nhận', array('class' => 'btn btn-dark bg-dark')); !!}
                @endif
                &nbsp;
                <a class="btn btn-dark bg-dark" href="{!! url()->previous() !!}" role="button">Trở về</a>
                </div>
            </div>
        </div>
    </form>
</x-app-layout>
