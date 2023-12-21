<x-jangkeyte::navs.index>
  <x-slot:title>
      Server Error
  </x-slot>

  <x-jangkeyte::navs.quick-item url="/lead/create" label="Khách hàng" icon="icon lead-icon" />
  <x-jangkeyte::navs.quick-item url="/quotation/create" label="Báo giá" icon="icon quotation-icon" />
  <x-jangkeyte::navs.quick-item url="/mail/create" label="Email" icon="icon mail-icon" />
  <x-jangkeyte::navs.quick-item url="/contacts/persons/create" label="Người" icon="person lead-icon" />
  <x-jangkeyte::navs.quick-item url="/contacts/organizations/create" label="Tổ chức" icon="icon organization-icon" />
  <x-jangkeyte::navs.quick-item url="/product/create" label="Sản phẩm" icon="icon product-icon" />
  <x-jangkeyte::navs.quick-item url="/settings/attribute/create" label="Thuộc tính" icon="icon attribute-icon" />
  <x-jangkeyte::navs.quick-item url="/settings/roles/create" label="Vai trò" icon="icon role-icon" />
  <x-jangkeyte::navs.quick-item url="/settings/users/create" label="Người dùng" icon="icon user-icon" />  
</x-jangkeyte::navs.index>

<x-jangkeyte::menus.index>
    <x-jangkeyte::menus.item url="/dashboard" label="Điều khiển" icon="icon sprite dashboard-icon" active="true" />
    <x-jangkeyte::menus.item url="/customer" label="Khách hàng" icon="icon sprite leads-icon" />
    <x-jangkeyte::menus.item url="/client" label="Báo giá" icon="icon sprite quotes-icon" />
    <x-jangkeyte::menus.item url="/mail/inbox" label="Hộp thư" icon="icon sprite emails-icon" active="active" :submenus="collect(array(['url' => '/mail/compose', 'label' => 'Soạn thư'],['url' => '/mail/inbox', 'label' => 'Hộp thư đến'],['url' => '/mail/draft', 'label' => 'Bản nháp'],['url' => '/mail/outbox', 'label' => 'Hộp thư đi'],['url' => '/mail/sent', 'label' => 'Thư đã gửi'],['url' => '/mail/trash', 'label' => 'Thùng rác']))" />
    <x-jangkeyte::menus.item url="/activities" label="Hoạt động" icon="icon sprite activities-icon" />
    <x-jangkeyte::menus.item url="/contacts/persons" label="Liên hệ" icon="icon sprite phone-icon" :submenus="collect(array(['url' => '/contacts/person', 'label' => 'Người'],['url' => '/contacts/organizations', 'label' => 'Tổ chức']))" />
    <x-jangkeyte::menus.item url="/products" label="Sản phẩm" icon="icon sprite products-icon" />
    <x-jangkeyte::menus.item url="/settings" label="Cài đặt" icon="icon sprite settings-icon" />
    <x-jangkeyte::menus.item url="/configuration" label="Cấu hình" icon="icon sprite tools-icon" />
</x-jangkeyte::menus.index>