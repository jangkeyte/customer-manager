@extends('Customer::master')

@section('title', 'Cập nhật thông tin khách hàng')

@section('entry_content')

    @include('Customer::customer.partials.customer-search-form')

    <p>Khách hàng [{{$customers->count()}}] 
        <button id="btnHide" class="btn btn-sm btn-outline-primary" style="float:right">Thu gọn</button>
        <a href="{{ route( substr(Route::current()->getPrefix(), 1) . '.create' ) }}" class="btn btn-sm btn-outline-success mx-2" style="float:right"><i class="fa fa-user-plus"></i> Tạo mới</a>
    </p>

    @isset($customers)
        <div id="customer_list_content" class="table-responsive w-100" style="min-height: 400px;">
            <table id="customerTable" class="table table-sm table-hover text-nowrap">
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
                <col class="col18"/>
                <thead class="text-center align-middle">
                    <tr>
                        <th>Stt</th>
                        <th>Hành động</th>
                        <th>Tên khách hàng</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Nguồn khách</th>
                        <th>Kênh liên hệ</th>
                        <th>Ngày nhập</th>
                        <th>Tình trạng</th>
                        <th>Loại xe</th>
                        <th>Màu xe</th>
                        @if(checkRoute('/customer'))
                        <th>Số khung</th>
                        <th>Số máy</th>
                        @endif
                        @if(!auth()->user()->hasRole('user','guest'))
                            @if(!auth()->user()->hasRole('leader'))
                                <th>Cửa hàng</th>
                            @endif
                            <th>Nhân viên</th>
                        @endif
                        <th>Ngày chăm sóc</th>
                        <th>Nội dung chăm sóc</th>
                        <th>Ghi chú</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                
                @foreach ($customers as $customer)
                    <tr>                
                    @if ($loop->count > 0)
                        <td class="text-center">
                            {{ $loop->index + 1 }}
                            {{-- $loop->index + 1 + (( $customers->currentPage() - 1 ) * $customers->perPage()) --}}
                        </td>
                        <td><x-customer::action name="action" label="Chọn" :options="collect(array( 'id' => $customer->ma_khach_hang ))" /></td>
                        <td><span class="position-relative">{{ $customer->ten_khach_hang }} 
                            @if($customer->tinh_trang == 1)
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger ms-3">
                                    Mới
                                    <span class="visually-hidden">Khách hàng mới</span>
                                </span>
                            @endif
                            </span>
                        </td>
                        <td class="text-center">{{ !empty($customer->province) && $customer->province->id != 0 ? $customer->province->name : $customer->dia_chi }}</td>
                        <td>{{ \Illuminate\Support\Str::substrReplace(str_replace(' ', '', $customer->so_dien_thoai), '***', 4, 3) }}</td>
                        <td class="text-center">{{ $customer->source->name ?? 'Chưa có' }}</td>
                        <td class="text-center">{{ $customer->channel->name ?? 'Chưa có' }}</td>

                        <td>{{ date('d/m/Y H:i:s', strtotime($customer->thoi_gian_nhan)) }}</td>
                        <td class="text-center"><span class="badge rounded-pill bg-{{ $customer->status->code ?? 'light text-dark' }} text-uppercase p-1 px-3">{{ $customer->status->name ?? 'không xác định' }}</span></td>

                        @if(checkRoute('/customer')) 
                            <td>{{ $customer->loai_xe }}</td>
                        @else
                            <td>{{ $customer->product->name ?? 'Chưa có' }}</td>
                        @endif

                        <td class="text-center">{{ $customer->mau_xe ?? 'Chưa có' }}</td>
                        @if(checkRoute('/customer'))
                            <td class="text-center">{{ $customer->so_khung ?? 'Chưa có' }}</td>
                            <td class="text-center">{{ $customer->so_may ?? 'Chưa có' }}</td>
                        @endif
                        
                        @if(!auth()->user()->hasRole('user','guest'))
                            @if(!auth()->user()->hasRole('leader'))
                                <td class="text-center">{{ $customer->cua_hang ?? 'Chưa có' }}</td>
                            @endif
                            <td>{{ $customer->staff->ten_nhan_vien ?? 'Không rõ' }}</td>
                        @endif

                        <td class="text-center">
                            @foreach ( $customer->carelogs as $carelog ) 
                                {{ $carelog->ngay_thuc_hien }} </br>
                            @endforeach
                        </td> 
                        <td>
                            @foreach ( $customer->carelogs as $carelog ) 
                                {{ $carelog->noi_dung }} </br>
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

        @push('scripts')
        <script>
        /*let table = new DataTable('#customerTable');*/

        jQuery(document).ready(function($) {
            $(".clickable-row").click(function() {
                window.location = $(this).data("href");
            });
        });
        </script>

        <script>
            const btnHide = document.getElementById( 'btnHide' )
            btnHide.addEventListener( "click", (e) => {
                @if(checkRoute('/customer'))
                    const cols = [0, 3, 5, 6, 7, 9, 10, 11, 12]            
                    @if(!auth()->user()->hasRole('user','guest'))
                        @if(!auth()->user()->hasRole('leader'))
                            cols.push(13)
                        @endif
                        cols.push(14)
                    @endif
                @else
                    const cols = [0, 3, 5, 6, 7, 9, 10]          
                    @if(!auth()->user()->hasRole('user','guest'))
                        @if(!auth()->user()->hasRole('leader'))
                            cols.push(11)
                        @endif
                        cols.push(12)
                    @endif
                @endif
                
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
        
        @include('Customer::customer.partials.customer-create-simple')

    @endisset

@endsection