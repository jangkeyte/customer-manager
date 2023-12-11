<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Trung tâm nhập dữ liệu') }}
        </h2>
    </x-slot>
    @if(Auth::user()->isAdmin()) 
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">                 
                <div class="d-grid gap-2">
                @isset($success) 
                    {!! $success !!}
                @endisset
                <form method="POST" action="{{ route('nhapnguoidung') }}" enctype="multipart/form-data">
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
                                <x-primary-button class="ml-4">
                                    {{ __('Nhập Users') }}
                                </x-primary-button>
                            </div>
                        </div>
                    </div>
                </form>
                
                <form method="POST" action="{{ route('nhapkhachhang') }}" enctype="multipart/form-data">
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
                                <x-primary-button class="ml-4">
                                    {{ __('Nhập Customers') }}
                                </x-primary-button>
                            </div>
                        </div>
                    </div>
                </form>
                
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
                                <x-primary-button class="ml-4">
                                    {{ __('Nhập CareLog') }}
                                </x-primary-button>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
    @else
        @include('customer.elements.khong_du_quyen')   
    @endif
</x-app-layout>