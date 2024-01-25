<x-jangkeyte::navs.index>
  <x-slot:title>
      Server Error
  </x-slot>
  <x-jangkeyte::navs.quick-item url="{{ route('customer.create') }}" label="Khách hàng" icon="icon person-icon" />
  <x-jangkeyte::navs.quick-item url="{{ route('client.create') }}" label="Tiềm năng" icon="icon lead-icon" />
  <x-jangkeyte::navs.quick-item url="{{ route('customer.import') }}" label="Khách hàng" icon="icon person-icon" right="import-customer" />
  <x-jangkeyte::navs.quick-item url="/quotation/create" label="Báo giá" icon="icon quotation-icon" right="create-quot" />
  <x-jangkeyte::navs.quick-item url="/mail/create" label="Email" icon="icon mail-icon" right="delete-user" />
  <x-jangkeyte::navs.quick-item url="/contacts/persons/create" label="Người" icon="person lead-icon" right="delete-user" />
  <x-jangkeyte::navs.quick-item url="/contacts/organizations/create" label="Tổ chức" icon="icon organization-icon" right="delete-user" />
  <x-jangkeyte::navs.quick-item url="/product/create" label="Sản phẩm" icon="icon product-icon" right="delete-user" />
  <x-jangkeyte::navs.quick-item url="/settings/attribute/create" label="Thuộc tính" icon="icon attribute-icon" right="delete-user" />
  <x-jangkeyte::navs.quick-item url="/settings/roles/create" label="Vai trò" icon="icon role-icon" right="delete-user" />
  <x-jangkeyte::navs.quick-item url="/settings/users/create" label="Người dùng" icon="icon user-icon" right="delete-user" />  
</x-jangkeyte::navs.index>

<x-jangkeyte::menus.index>
  <x-jangkeyte::menus.item url="/dashboard" label="Điều khiển" icon="icon sprite dashboard-icon" active="true" />
  <x-jangkeyte::menus.item url="/customer" label="Khách hàng" icon="icon sprite avatar-icon" />
  <x-jangkeyte::menus.item url="/client" label="Tiềm năng" icon="icon sprite leads-icon" />
  <x-jangkeyte::menus.item url="#" label="Người dùng" icon="icon sprite settings-icon" >
    <x-jangkeyte::menus.sub-item url="{{ route('user') }}" label="Danh sách Người dùng" right="browse-user" />
    <x-jangkeyte::menus.sub-item url="{{ route('user.detail', auth()->user()->id) }}" label="Thông tin tài khoản" />
    <x-jangkeyte::menus.sub-item url="{{ route('user.detail', auth()->user()->id) }}" label="Thông tin cá nhân" />
    <x-jangkeyte::menus.sub-item url="{{ route('user.update', auth()->user()->id) }}" label="Đổi mật khẩu" />
    <x-jangkeyte::menus.sub-item url="{{ route('user.update', auth()->user()->id) }}" label="Cập nhật thông tin" />
    <x-jangkeyte::menus.sub-item url="{{ route('user.logout') }}" label="Đăng xuất" />
  </x-jangkeyte::menus.item>
  
  <x-jangkeyte::menus.item url="/client" label="Báo giá" icon="icon sprite quotes-icon" right="delete-user" />
  <x-jangkeyte::menus.item url="#" label="Hộp thư" icon="icon sprite emails-icon" right="delete-user">
    <x-jangkeyte::menus.sub-item url="/mail/compose" label="Soạn thư" />
    <x-jangkeyte::menus.sub-item url="/mail/inbox" label="Hộp thư đến" />
    <x-jangkeyte::menus.sub-item url="/mail/draft" label="Bản nháp" />
    <x-jangkeyte::menus.sub-item url="/mail/outbox" label="Hộp thư đi" />
    <x-jangkeyte::menus.sub-item url="/mail/sent" label="Thư đã gửi" />
    <x-jangkeyte::menus.sub-item url="/mail/trash" label="Thùng rác" />
  </x-jangkeyte::menus.item>
  <x-jangkeyte::menus.item url="/activities" label="Hoạt động" icon="icon sprite activities-icon" right="delete-user"  />
  <x-jangkeyte::menus.item url="/contacts/persons" label="Liên hệ" icon="icon sprite phone-icon" right="delete-user"  :submenus="collect(array(['url' => '/contacts/person', 'label' => 'Người'],['url' => '/contacts/organizations', 'label' => 'Tổ chức']))" />
  <x-jangkeyte::menus.item url="/products" label="Sản phẩm" icon="icon sprite products-icon" right="delete-user"  />
  <x-jangkeyte::menus.item url="/settings" label="Cài đặt" icon="icon sprite settings-icon" right="delete-user"  />
  <x-jangkeyte::menus.item url="/configuration" label="Cấu hình" icon="icon sprite tools-icon" right="delete-user"  />
    
</x-jangkeyte::menus.index>