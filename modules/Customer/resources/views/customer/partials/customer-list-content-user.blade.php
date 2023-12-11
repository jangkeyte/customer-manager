@include('customer.partials.customer-search-form')

@isset($customers)
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-success text-center align-middle">
                <tr>
                    <th colspan="9" class="bg-primary text-light">NGƯỜI CHUYỂN KHÁCH</td>
                    <th colspan="8" class="bg-success text-light">THÔNG TIN KHÁCH HÀNG</td>
                    <th colspan="3" class="bg-warning">ĐEO BÁM & THÚC ĐẨY KHÁCH HÀNG</td>
                    <th rowspan="2" class="bg-dark text-light">Ghi chú của CHT / Quản lCHT</th>
                    <th colspan="3" class="bg-secondary">Check</td>
                </tr>
                <tr>
                    <th class="bg-primary text-light">Stt</th>
                    <th class="bg-primary text-light">Nguồn khách</th>
                    <th class="bg-primary text-light">Kênh liên hệ</th>
                    <th colspan="2" class="bg-primary text-light">Số điện thoại</th>
                    <th class="bg-primary text-light">Người chuyển</th>
                    <th class="bg-primary text-light">Có SĐT khách lúc</th>
                    <th class="bg-primary text-light">Chuyển khách lúc</th>
                    <th class="bg-primary text-light">Tốc độ chuyển</th>
                    @if(Auth::user()->isLeader()) 
                    <th>Người phụ trách</th>
                    @endif
                    <th class="bg-success text-light">Liên hệ lại khách lúc</th>
                    <th class="bg-success text-light">Tốc độ liên hệ</th>
                    <th class="bg-success text-light">Tên khách hàng</th>
                    <th class="bg-success text-light">Địa chỉ</th>
                    <th class="bg-success text-light">Email / Fb hoặc link khác</th>
                    <th class="bg-success text-light">Ghi chú</th>
                    @if(Route::is('customer-dashboard') || Route::is('timkhachhang')) 
                    <th class="bg-success text-light">Ngày mua</th>
                    @else
                    <th class="bg-success text-light">Tình trạng</th>
                    @endif
                    <th class="bg-success text-light">Loại xe</th>
                    @if(Route::is('customer-dashboard') || Route::is('timkhachhang')) 
                    <th class="bg-success text-light">Màu xe</th>
                    @endif
                    <th class="bg-warning">Thời gian</th>
                    <th class="bg-warning">Kết quả sau khi hành động</th>
                    <th class="bg-warning">Hành động tiếp theo</th>
                    <th class="bg-secondary">Kết quả</th>
                    <th class="bg-secondary">Người check</th>
                    <th class="bg-secondary">Thời gian</th>
                </tr>
            </thead>
            <tbody class="align-middle">
            
            @foreach ($customers as $customer)
                @if(Auth::user()->haveRights('contact_customer'))
                <tr class="table-{{ $customer->status->code }} clickable-row" data-href="{!! route( 'chamsockhachhang', $customer->ma_khach_hang ) !!}">                
                @else
                <tr class="table-{{ $customer->status->code }}">    
                @endif
                @if ($loop->count > 0)
                    <td class="text-center">{{ $loop->index + 1 + (( $customers->currentPage() - 1 ) * $customers->perPage()) }}</td>                 
                    <td class="text-center">{{ $customer->source->name }}</td>
                    <td class="text-center">{{ $customer->channel->name ?? 'Chưa có' }}</td>
                    <td>{!! Str::mask($customer->so_dien_thoai, '*', 4, 3); !!}</td>
                    <td>{{ $customer->lay_so ?? 'tự cho' }}</td>
                    <td class="text-center">{{ $customer->nguoi_chuyen->ten_nhan_vien ?? $customer->user->ten_nhan_vien }}</td>
                    <td class="text-center">{{ date('d/m/Y - h:i:s', strtotime($customer->thoi_gian_co_so ?? $customer->ngay_lien_he)) }}</td>                        
                    <td class="text-center">{{ date('d/m/Y - h:i:s', strtotime($customer->ngay_lien_he ?? '')) }}</td>
                    <td class="text-center">{{ round((strtotime( $customer->ngay_lien_he ?? 0 ) - strtotime( $customer->thoi_gian_co_so ?? $customer->ngay_lien_he )) / 60, 2) }} phút</td>
                    @if(Auth::user()->isLeader()) 
                    <td>{{ $customer->user->ten_nhan_vien ?? 'Chưa có' }}</td>
                    @endif
                    <td class="text-center">{{ $customer->carelogs[0]->ngay_thuc_hien ?? 'Chưa liên hệ' }}</td>
                    <td class="text-center">{{ round((strtotime( $customer->carelogs[0]->ngay_thuc_hien ?? 0 ) - strtotime( $customer->ngay_lien_he ) ?? 0) / 60, 2) }} phút</td>
                    <td>{{ $customer->ten_khach_hang }}</td>
                    <td class="text-center">{{ !empty($customer->province) && $customer->province->id != 0 ? $customer->province->name : $customer->dia_chi }}</td>   
                    <td class="text-center">{{ $customer->link ?? '' }}</td>   
                    <td class="text-center">{{ $customer->ghi_chu }}</td>
                    @if(Route::is('customer-dashboard') || Route::is('timkhachhang')) 
                    <td>{{ date('d/m/Y', strtotime($customer->ngay_mua)) }}</td>
                    @else
                    <td>{{ $customer->status->name }}</td>
                    @endif
                    @if(Route::is('customer-dashboard') || Route::is('timkhachhang')) 
                    <td>{{ $customer->loai_xe }}</td>
                    <td class="text-center">{{ $customer->mau_xe }}</td>    
                    @else
                    <td>{{ $customer->product->name }}</td>
                    @endif
                    <td class="text-center">
                    @foreach ( $customer->carelogs as $carelog ) 
                        {{ date('d/m/Y - h:i:s', strtotime($carelog->ngay_thuc_hien)) }}<br>
                    @endforeach
                    </td>
                    <td>
                    @foreach ( $customer->carelogs as $carelog ) 
                        {{ $carelog->noi_dung }}<br>
                    @endforeach
                    </td>
                    <td>
                    @foreach ( $customer->carelogs as $carelog ) 
                        {{ $carelog->noi_dung }}<br>
                    @endforeach
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
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