@extends('Customer::master')

@section('title', 'Thêm mới khách hàng')

@section('entry_content')

    @if(auth()->user()->can('import-customer'))
                
        <div class="py-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">                 
                    <div class="d-grid gap-2">                    
                        @if(session()->has('message'))
                            @if(is_int(session()->get('message')))
                            <div class="alert alert-success">
                                Nhập [<strong>{{ session()->get('message') }}</strong>] dòng dữ liệu thành công.
                            </div>
                            @else
                            <div class="alert alert-danger">
                                Dữ liệu dòng thứ [<strong>{!! session()->get('message')->row() - 1 !!}</strong>] bị lỗi [<strong>{!! session()->get('message')->attribute() !!}</strong>] lý do [<strong>{!! session()->get('message')->errors()[0] !!}</strong>] với dữ liệu là [<strong>{!! session()->get('message')->values()[session()->get('message')->attribute()] !!}</strong>]
                            </div>
                            @endif
                        @endif
                        @if($errors->has('area'))
                            <div class="error">{{ $errors->first('area') }}</div>
                        @endif

                        <form method="POST" action="{{ route('import.customer') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="container pt-2">
                                <div class="row g-2">
                                    
                                    <div class="col-6 mb-3">
                                        <label class="form-label" for="inputFile">File:</label>
                                        <input 
                                            type="file" 
                                            name="file" 
                                            id="inputFile"
                                            class="form-control @error('file') is-invalid @enderror">
                        
                                        @error('file')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                        
                                    <div class="col-6 flex items-center justify-end mt-4">
                                        <x-jangkeyte::forms.button text="{{ __('Nhập Customers') }}" icon="fa fa-save" class="btn btn-sm btn-success" />
                                    </div>
                                </div>
                            </div>
                        </form>
                        <dev class="col-12">Tải về <a href="/storage/uploads/customer_template.xlsx" target="_blank">file mẫu</a></div>
                        <!--
                        <form method="POST" action="{{ route('nhapchamsockhach') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="container pt-2">
                                <div class="row g-2">
                                    
                                    <div class="col-6 mb-3">
                                        <label class="form-label" for="inputFile">File:</label>
                                        <input 
                                            type="file" 
                                            name="file" 
                                            id="inputFile"
                                            class="form-control @error('file') is-invalid @enderror">
                        
                                        @error('file')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                        
                                    <div class="col-6 flex items-center justify-end mt-4">
                                        <x-jangkeyte::forms.button text="{{ __('Nhập CareLog') }}" icon="fa fa-save" class="btn btn-sm btn-success" />                                    
                                    </div>
                                </div>
                            </div>
                        </form>
                        -->
                    </div>
                </div>
            </div>
        </div>
    @else

        {{ abort(403) }}

    @endif

@endsection