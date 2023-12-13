@include('Customer::customer.partials.customer-search-form')
<p>Danh sách Khách hàng [{{$customers->count()}}] <button id="btnHide">Thu gọn</button></p>

@isset($customers)
    <div id="customer_list_content" class="table-responsive">
        <table class="table table-bordered table-hover">
            <col class="col1"/>
            <col class="col2"/>
            <col class="col3"/>
            <col class="col4"/>
            <col class="col5"/>
            <col class="col6"/>
            <col class="col7"/>
            <col class="col8"/>
            <col class="col9"/>
            <col class="col10"/>
            <col class="col11"/>
            <col class="col12"/>
            <col class="col13"/>
            <col class="col14"/>
            <col class="col15"/>
            <col class="col16"/>
            <col class="col17"/>
            <thead class="table-dark text-center align-middle">
                <tr>
                    <th>Stt</th>
                    <th>Tên khách hàng</th>
                    <th>Địa chỉ</th>
                    <th>Số điện thoại</th>
                    <th>Nguồn khách</th>
                    <th>Kênh liên hệ</th>
                    <th>Ngày nhập</th>
                    <th>Tình trạng</th>
                    <th>Loại xe</th>
                    <th>Màu xe</th>
                    @if(Route::current()->getPrefix() == '/customer') 
                    <th>Số khung</th>
                    <th>Số máy</th>
                    @endif
                    <th>Cửa hàng</th>
                    <th>Nhân viên</th>
                    <th>Nội dung chăm sóc</th>
                    <th>Ngày chăm sóc</th>
                    <th>Ghi chú</th>
                </tr>
            </thead>
            <tbody class="align-middle">
            
            @foreach ($customers as $customer)
                <tr class="table-{{ $customer->status->code }}">                
                @if ($loop->count > 0)
                    @if(Route::current()->getPrefix() == '/customer')
                        <td class="text-center"><a href="{!! route( 'detail.customer', $customer->ma_khach_hang ) !!}">{{ $loop->index + 1 + (( $customers->currentPage() - 1 ) * $customers->perPage()) }}</a></td>
                    @else
                        <td class="text-center">{{ $loop->index + 1 + (( $customers->currentPage() - 1 ) * $customers->perPage()) }}</td>
                    @endif
                    <td>{{ $customer->ten_khach_hang }}</td>
                    <td class="text-center">{{ !empty($customer->province) && $customer->province->id != 0 ? $customer->province->name : $customer->dia_chi }}</td>
                    <td>{{ \Illuminate\Support\Str::substrReplace(str_replace(' ', '', $customer->so_dien_thoai), '***', 4, 3) }}</td>
                    <td class="text-center">{{ $customer->source->name ?? 'Chưa có' }}</td>
                    <td class="text-center">{{ $customer->channel->name ?? 'Chưa có' }}</td>

                    <td>{{ date('d/m/Y H:i:s', strtotime($customer->ngay_nhap)) }}</td>
                    <td>{{ $customer->status->name }}</td>

                    @if(Route::current()->getPrefix() == '/customer') 
                    <td>{{ $customer->loai_xe }}</td>
                    @else
                    <td>{{ $customer->product->name ?? 'Chưa có' }}</td>
                    @endif
                    <td class="text-center">{{ $customer->mau_xe }}</td>
                    @if(Route::current()->getPrefix() == '/customer') 
                    <td class="text-center">{{ $customer->so_khung }}</td>
                    <td class="text-center">{{ $customer->so_may }}</td>
                    @endif
                    <td class="text-center">{{ $customer->cua_hang }}</td>
                    <td>{{ $customer->staff->ten_nhan_vien ?? $customer->id }}</td>
                    <td>
                        @foreach ( $customer->carelogs as $carelog ) 
                            {{ $carelog->noi_dung }} </br>
                        @endforeach
                    </td>
                    <td class="text-center">
                        @foreach ( $customer->carelogs as $carelog ) 
                            {{ $carelog->ngay_thuc_hien }} </br>
                        @endforeach
                    </td> 
                    <td>{{ $customer->ghi_chu }}</td>
                @endif
                </tr>
            @endforeach
            </tbody>
        </table>  
        {{ $customers->onEachSide(2)->links() }}
    </div>
@endisset

@push('scripts')
<script>
jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
});
</script>

<script>
    const btnHide = document.getElementById( 'btnHide' )
    btnHide.addEventListener( "click", (e) => {
        const cols = [0, 2, 4, 5, 6, 8, 9, 10, 11, 14, 15, 16]
        for (let x of cols) {
            toggleColumn(x)
        }
        if(btnHide.innerHTML == 'Đầy đủ') {
            btnHide.innerHTML = 'Thu gọn';
        } else {
            btnHide.innerHTML = 'Đầy đủ';
        }
    });

    function toggleColumn(col_no) {
        const table  = document.getElementById( 'customer_list_content' )
        var e = table.getElementsByTagName( 'col' )[col_no]
        if(e.style.visibility == 'collapse') {
            e.style.visibility = '';
        } else {
            e.style.visibility = 'collapse';
        }
    }

    const btnShow = document.getElementById( 'btnShow' )
    btnShow.addEventListener( "click", (e) => show_hide_column( 3, true ))
</script>
@endpush