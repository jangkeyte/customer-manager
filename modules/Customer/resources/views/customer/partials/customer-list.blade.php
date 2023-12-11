@if(Auth::user()->isAdmin() || Auth::user()->isManager())             
    @include('customer.partials.customer-list-content-admin')
    <p>Đây là trang admin quản lý</p>
@else
    @include('customer.partials.customer-list-content-user')
    <p>Đây là trang người dùng</p>
@endif