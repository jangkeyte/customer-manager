@extends('Customer::master')

@section('title', 'Cập nhật thông tin khách hàng')

@section('entry_content')

    @if(isset($customer))
    
        @if(!auth()->user()->can('create_carelog'))
         
            {{ html()->form('POST')->route('create.' . substr(Route::current()->getPrefix(), 1))->open() }}
                @csrf
                <div class="container pt-2">
                    <div class="row g-2">
                        <p class="fs-4">Thông tin chăm sóc Khách hàng </br><span class="fw-bold">{!! $customer->ten_khach_hang !!}</span> | <span class="fs-5">{!! $customer->so_dien_thoai !!}</span></p>

                        <!-- Mã khách hàng -->
                        <div class="col-md-12 form-floating mb-3 visually-hidden">
                            {!! Form::text('khach_hang', $customer->ma_khach_hang, array('class' => 'form-control')); !!}
                        </div>

                        <!-- Tình trạng -->
                        <div class="col-md-4 form-floating mb-3">
                            <x-jangkeyte::forms.select name="tinh_trang" label="Tình trạng" :options="$status" :value="$customer->tinh_trang" />
                        </div>

                        <!-- Nội dung -->
                        <div class="col-md-8 form-floating mb-3">
                            <x-jangkeyte::forms.text name="noi_dung" label="Nội dung" :value="$customer->mau_xe" />
                        </div>

                        @isset($customer->carelogs)
                            @foreach($customer->carelogs as $carelog) 
                            <div class="col-md-12 form-floating mb-3">
                                <x-jangkeyte::forms.text name="noi_dung_cham_soc" :label="'Lần ' . $loop->index + 1 . ' | ' . substr( $carelog->status->name, 6 ) . ' | ' . date('d/m/Y - h:m:s',  strtotime($carelog->ngay_thuc_hien))" :value="$carelog->noi_dung" disabled="disabled" />                               
                            </div>
                            @endforeach
                        @endisset

                        <div class="col-md-12 form-floating mb-3">
                            {!! Form::text('ghi_chu', $customer->ghi_chu, array('class' => 'form-control', 'disabled' => 'disabled')); !!}
                            {!! Form::label('ghi_chu', 'Ghi chú'); !!}
                        </div>

                        <div class="flex items-center justify-end mt-4">
                        <a class="btn btn-dark bg-dark" href="{!! route('customer.detail', $customer->ma_khach_hang ) !!}" role="button">Xem thông tin</a>
                        {!! Form::submit('Xác nhận', array('class' => 'btn btn-dark bg-dark')); !!}
                        <a class="btn btn-dark bg-dark" href="{!! url()->previous() !!}" role="button">Trở về</a>
                        </div>
                    </div>
                </div>
            {{ html()->form()->close() }}

        @else

            {{ abort(403) }}

        @endif

    @else

        {{ abort(404) }}

    @endif

@endsection