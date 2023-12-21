@extends('Customer::master')

@section('title', 'Cập nhật thông tin khách hàng')

@section('entry_content')

    @include('Customer::customer.partials.customer-search-form')

    <p>Danh sách Khách hàng [{{$customers->count()}}] 
        <button id="btnHide" class="btn btn-sm btn-outline-primary" style="float:right">Thu gọn</button>
        <a href="{{ route( substr(Route::current()->getPrefix(), 1) . '.create' ) }}" class="btn btn-sm btn-outline-success mx-2" style="float:right"><i class="fa fa-user-plus"></i> Tạo mới</a>
    </p>

    @isset($customers)
        <div id="customer_list_content" class="table-responsive" style="min-height: 400px;">
            <table class="table table-sm table-hover text-nowrap">
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
                        <th>Stt 0</th>
                        <th>Hành động 1</th>
                        <th>Tên khách hàng 2</th>
                        <th>Địa chỉ 3</th>
                        <th>Số điện thoại 4</th>
                        <th>Nguồn khách 5</th>
                        <th>Kênh liên hệ 6</th>
                        <th>Ngày nhập 7</th>
                        <th>Tình trạng 8</th>
                        <th>Loại xe 9</th>
                        <th>Màu xe 10</th>
                        @if(checkRoute('/customer'))
                        <th>Số khung 11</th>
                        <th>Số máy 12</th>
                        @endif
                        @if(!auth()->user()->hasRole('user','guest'))
                            @if(!auth()->user()->hasRole('leader'))
                                <th>Cửa hàng 13</th>
                            @endif
                            <th>Nhân viên 14</th>
                        @endif
                        <th>Ngày chăm sóc 15</th>
                        <th>Nội dung chăm sóc 16</th>
                        <th>Ghi chú 17</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                
                @foreach ($customers as $customer)
                    <tr>                
                    @if ($loop->count > 0)
                        @if(checkRoute('/customer'))
                            <td class="text-center">
                                <a href="{!! route( 'customer.detail', $customer->ma_khach_hang ) !!}">
                                    {{ $loop->index + 1 + (( $customers->currentPage() - 1 ) * $customers->perPage()) }}
                                </a>
                            </td>
                        @else
                            <td class="text-center">
                                {{ $loop->index + 1 + (( $customers->currentPage() - 1 ) * $customers->perPage()) }}
                            </td>
                        @endif
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
                        <td class="text-center"><span class="badge rounded-pill bg-{{ $customer->status->code }} text-uppercase p-1 px-3">{{ substr($customer->status->name, 6) }}</span></td>

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