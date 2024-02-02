@extends('Customer::master')

@section('title', 'Bảng thống kê tổng quan')

@section('entry_content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="container mt-3">
            <h2>Thống kê dữ liệu Khách hàng</h2>
            <br>
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#customer">Khách hàng đã mua</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#client">Khách hàng tiềm năng</a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div id="customer" class="container-fluid tab-pane active">  
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">{{ $khachhang_theo_thang->options['chart_title'] }}</div>
                                <div class="card-body">
                                    {!! $khachhang_theo_thang->renderHtml() !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">{{ $khachhang_theo_nhanvien->options['chart_title'] }}</div>
                                <div class="card-body">
                                    {!! $khachhang_theo_nhanvien->renderHtml() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="client" class="container-fluid tab-pane fade">       
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">{{ $khachhang_theo_tinhtrang->options['chart_title'] }}</div>
                                <div class="card-body">
                                    {!! $khachhang_theo_tinhtrang->renderHtml() !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">{{ $khachhang_theo_showroom->options['chart_title'] }}</div>
                                <div class="card-body">
                                    {!! $khachhang_theo_showroom->renderHtml() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
{!! $khachhang_theo_thang->renderChartJsLibrary() !!}
{!! $khachhang_theo_thang->renderJs() !!}

{!! $khachhang_theo_nhanvien->renderChartJsLibrary() !!}
{!! $khachhang_theo_nhanvien->renderJs() !!}

{!! $khachhang_theo_nhanvien->renderChartJsLibrary() !!}
{!! $khachhang_theo_tinhtrang->renderJs() !!}

{!! $khachhang_theo_showroom->renderChartJsLibrary() !!}
{!! $khachhang_theo_showroom->renderJs() !!}

@endpush