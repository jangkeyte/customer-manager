<div class="container-fluid px-0 mx-0 mt-2 z-0">    
    @if(Route::current()->getPrefix() == '/customer') 
    <form method="POST" action="{{ route('customer.search') }}">
    @else
    <form method="POST" action="{{ route('client.search') }}">
    @endif
        @csrf
        <div class="row">
            <div class="col-md-2">
                <!-- Từ khóa -->
                <div class="col-md-12 form-floating mb-3">
                    <x-jangkeyte::forms.text name="keyword" label="Từ khóa" />
                </div>
            </div>
            <div id="advanced-search" class="col-md-9 visually-hidden">
                <div class="row advandced-search g-0">
                    <!-- Nếu không phải là người dùng hoặc khách thì có thể tìm kiếm theo cửa hàng và nhân viên -->
                    @if(!auth()->user()->hasRole('user','guest'))

                        <!-- Nếu không phải là trưởng nhóm thì có thể tìm kiếm theo cửa hàng -->
                        @if(!auth()->user()->hasRole('leader'))
                            <!-- Cửa hàng -->
                            <div class="col-md-1 form-floating mb-3">
                                <x-jangkeyte::forms.select name="cua_hang" label="Cửa hàng" :options="$cua_hang" />
                            </div>
                        @endif
                        
                        <!-- Nhân viên -->
                        <div class="col-md-1 form-floating mb-3">
                            <x-jangkeyte::forms.select name="nhan_vien" label="Nhân viên" :options="$nhan_vien" />
                        </div>
                    @endif
                    
                    <!-- Nguồn khách -->
                    <div class="col-md-2 form-floating mb-3">
                        <x-jangkeyte::forms.select name="nguon_khach" label="Nguồn khách" :options="$nguon_khach" />
                    </div>

                    <!-- Kênh liên hệ -->
                    <div class="col-md-1 form-floating mb-3">
                        <x-jangkeyte::forms.select name="kenh_lien_he" label="Kênh liên hệ" :options="$kenh_lien_he" />
                    </div>

                    <!-- Trong tháng -->
                    <div class="col-md-1 form-floating mb-3">
                        <x-jangkeyte::forms.select name="thoi_gian" label="Trong tháng" :options="$thoi_gian" />
                    </div>

                    <!-- Thời gian -->
                    <div class="col-md-2 form-floating mb-3">
                        <x-jangkeyte::forms.date name="tu_ngay" label="Từ ngày" :value="date('Y-m-d', strtotime('2022-06-01'))" />   
                    </div>

                    <div class="col-md-2 form-floating mb-3">
                        <x-jangkeyte::forms.date name="den_ngay" label="Đến ngày" :value="date('Y-m-d', strtotime(now()))" />   
                    </div>
                    
                    <!-- Order by -->
                    <div class="col-md-1 form-floating mb-3">
                        <x-jangkeyte::forms.select name="sap_xep" label="Sắp xếp theo" :options="$sap_xep" />
                    </div>

                    <!-- Order by -->
                    <div class="col-md-1 form-floating mb-3">
                        <x-jangkeyte::forms.select name="sap_xep_theo" label="Chiều hướng" :options="$sap_xep_theo" />
                    </div>
                    
                </div>
            </div>
            <!-- Nút xác nhận -->
            <div class="col-md-1 mb-2">
                <div class="btn-group btn-group-sm" role="group" aria-label="Large button group">
                    <span class="btn btn-outline-primary" onclick="toogle_searchform()"><i id="button-expand" class="fa-solid fa-plus"></i></span>
                    <x-jangkeyte::forms.button text="Tìm" icon="fa fa-magnifying-glass" class="btn btn-sm btn-primary" /> 
                </div> 
            </div>
        </div>
    </form>
</div>

@push('scripts')
<script>
function toogle_searchform(){
    const adv_search  = document.getElementById( 'advanced-search' )
    const btn_expand = document.getElementById( 'button-expand' )
    adv_search.classList.toggle('visually-hidden');
    if(btn_expand.classList.contains('fa-plus')){
        btn_expand.classList.remove('fa-plus')
        btn_expand.classList.add('fa-minus')
    } else {
        btn_expand.classList.remove('fa-minus')
        btn_expand.classList.add('fa-plus')
    }
}
</script>
@endpush