@if(Auth::user()->can('browse-customer') || Auth::user()->can('browse-customer'))             
    @include('Customer::customer.partials.customer-list-content-admin')
    <p>Đây là trang admin quản lý</p>
@else
    @include('Customer::customer.partials.customer-list-content-user')
    <p>Đây là trang người dùng</p>
@endif
