<div class="dropdown dropstart">
    <button type="button" class="btn btn-outline-primary bg-white" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside" style="position:fixed;bottom:20px;right:20px;">
        <i class="fa fa-user-plus"></i> Tạo mới nhanh
    </button>
    {{ html()->form('POST')->route( routeAction( 'create', 'post' ) )->class('dropdown-menu p-4')->open() }}
        <div class="mb-3 form-floating">
            <x-jangkeyte::forms.text name="ten_khach_hang" label="Tên khách hàng" />
        </div>
        <div class="mb-3 form-floating">
            <x-jangkeyte::forms.text name="so_dien_thoai" label="Số điện thoại" required="required" autofocus="true" />
        </div>
        <x-jangkeyte::forms.button text="Lưu lại" icon="fa fa-save" class="btn btn-sm btn-success" />
    {{ html()->form()->close() }}
</div>