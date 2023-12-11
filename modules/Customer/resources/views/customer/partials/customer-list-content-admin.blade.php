@include('customer.partials.customer-search-form')
<p>Danh sách Khách hàng [{{$customers->count()}}]</p>
@isset($customers)
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-dark text-center align-middle">
                <tr>
                    <th>Stt</th>
                    <th>Tên khách hàng</th>
                    <th>Địa chỉ</th>
                    <th>Số điện thoại</th>
                    <th>Nguồn khách</th>
                    <th>Kênh liên hệ</th>
                    @if(Route::is('customer-dashboard') || Route::is('timkhachhang')) 
                    <th>Ngày mua</th>
                    @else
                    <th>Ngày liên hệ</th>
                    <th>Tình trạng</th>
                    @endif
                    <th>Loại xe</th>
                    <th>Màu xe</th>
                    @if(Route::is('customer-dashboard') || Route::is('timkhachhang')) 
                    <th>Số khung</th>
                    <th>Số máy</th>
                    @endif
                    <th>Cửa hàng</th>
                    <th>Nhân viên</th>
                    <th>Chăm sóc lần 1</th>
                    <th>Ngày chăm sóc</th>
                    <th>Chăm sóc lần 2</th>
                    <th>Ngày chăm sóc</th>
                    <th>Chăm sóc lần 3</th>
                    <th>Ngày chăm sóc</th>
                    <th>Chăm sóc lần 4</th>
                    <th>Ngày chăm sóc</th>
                    <th>Chăm sóc lần 5</th>
                    <th>Ngày chăm sóc</th>
                    <th>Ghi chú</th>
                </tr>
            </thead>
            <tbody class="align-middle">
            
            @foreach ($customers as $customer)
                <tr class="table-{{ $customer->status->code }}">                
                @if ($loop->count > 0)
                    @if(((Route::is('customer-dashboard') || Route::is('timkhachhang')) && Auth::user()->haveRights('edit_customer_1')) || ((Route::is('client-dashboard') || Route::is('timkhachhangtiemnang')) && Auth::user()->haveRights('edit_customer_0')))
                        <td class="text-center"><a href="{!! route( 'thongtinkhachhang', $customer->ma_khach_hang ) !!}">{{ $loop->index + 1 + (( $customers->currentPage() - 1 ) * $customers->perPage()) }}</a></td>
                    @else
                        <td class="text-center">{{ $loop->index + 1 + (( $customers->currentPage() - 1 ) * $customers->perPage()) }}</td>
                    @endif
                    <td>{{ $customer->ten_khach_hang }}</td>
                    <td class="text-center">{{ !empty($customer->province) && $customer->province->id != 0 ? $customer->province->name : $customer->dia_chi }}</td>
                    @if(Auth::user()->haveRights('show_phone'))
                        <td>{{ str_replace(' ', '', $customer->so_dien_thoai) }}</td>
                    @else
                        <td>{{ \Illuminate\Support\Str::substrReplace(str_replace(' ', '', $customer->so_dien_thoai), '***', 4, 3) }}</td>
                    @endif
                    <td class="text-center">{{ $customer->source->name ?? 'Chưa có' }}</td>
                    <td class="text-center">{{ $customer->channel->name ?? 'Chưa có' }}</td>
                    @if(Route::is('customer-dashboard') || Route::is('timkhachhang')) 
                    <td>{{ date('d/m/Y', strtotime($customer->ngay_mua)) }}</td>
                    @else
                    <td>{{ date('d/m/Y H:i:s', strtotime($customer->ngay_lien_he)) }}</td>
                    <td>{{ $customer->status->name }}</td>
                    @endif
                    @if(Route::is('customer-dashboard') || Route::is('timkhachhang')) 
                    <td>{{ $customer->loai_xe }}</td>
                    @else
                    <td>{{ $customer->product->name }}</td>
                    @endif
                    <td class="text-center">{{ $customer->mau_xe }}</td>
                    @if(Route::is('customer-dashboard') || Route::is('timkhachhang')) 
                    <td class="text-center">{{ $customer->so_khung }}</td>
                    <td class="text-center">{{ $customer->so_may }}</td>
                    @endif
                    <td class="text-center">{{ $customer->cua_hang }}</td>
                    <td>{{ $customer->user->ten_nhan_vien ?? $customer->id }}</td>
                    @foreach ( $customer->carelogs as $carelog ) 
                        <td>{{ $carelog->noi_dung }}</td>
                        <td class="text-center">{{ $carelog->ngay_thuc_hien }}</td>  
                    @endforeach
                    @if( $customer->carelogs->count() < 5 )
                        @for( $i = 0 ; $i < 5 - $customer->carelogs->count(); $i++ )                            
                            <td></td><td></td>
                        @endfor
                    @endif
                    <td>{{ $customer->ghi_chu }}</td>
                @endif
                </tr>
            @endforeach
            </tbody>
        </table>  
        {{ $customers->onEachSide(2)->links() }}
    </div>
@endisset

<script>
jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
});
</script>