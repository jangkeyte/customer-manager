<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Khách hàng') }}
        </h2>
        @if(Auth::user()->haveRights(array('add_customer_0','add_customer_1')))
        <div class="me-3 mb-3 position-fixed bottom-0 end-0" style="z-index:9999">
            <div class="float-end"><a href="{{ route('themkhachhang') }}" class="btn btn-dark bg-dark pull-right">{{ __('Thêm khách hàng') }}</a></div>
        </div>
        @endif
    </x-slot>
    <div class="py-4">
        <div class="container-fluid">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">          
                @include('customer.partials.customer-list')
            </div>
        </div>
    </div>

</x-app-layout>
