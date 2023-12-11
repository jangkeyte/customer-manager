<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead class="table-success text-center align-middle">
            <tr>
                <th>Stt</th>
                <th>Mã khách hàng</th>
                <th>Tên khách hàng</th>
                <th>Địa chỉ</th>
                <th>Số điện thoại</th>
                <th>Nguồn</th>
                <th>Ngày mua</th>
                <th>Loại xe</th>
                <th>Màu xe</th>
                <th>Số khung</th>
                <th>Số máy</th>
                <th>Cửa hàng</th>
                <th>Nhân viên</th>
                <th>Showroom</th>
                <th>Chăm sóc lần 1</th>
                <th>Ngày chăm sóc lần 1</th>
                <th>Chăm sóc lần 2</th>
                <th>Ngày chăm sóc lần 2</th>
                <th>Chăm sóc lần 3</th>
                <th>Ngày chăm sóc lần 3</th>
                <th>Chăm sóc lần 4</th>
                <th>Ngày chăm sóc lần 4</th>
                <th>Chăm sóc lần 5</th>
                <th>Ngày chăm sóc lần 5</th>
                <th>Ghi chú</th>
            </tr>
        </thead>
        <tbody class="align-middle">
            <div id="accordion">
                @foreach ($customers as $customer) 
                    @if ($loop->count > 0)  
                        <div class="card">
                            <div class="card-header">
                                <a class="btn" data-bs-toggle="collapse" href="#collapse{{ $loop->index + 1 }}">
                                    Collapsible Group Item {{ $loop->index + 1 }}
                                </a>
                            </div>
                            <div id="collapse{{ $loop->index + 1 }}" class="collapse" data-bs-parent="#accordion">
                                <div class="card-body">   
                                    <tr>                       
                                        <td class="text-center">{{ $loop->index + 1 }}</td>
                                        <td>{{ $customer->ma_khach_hang }}</td>
                                        <td>{{ $customer->ten_khach_hang }}</td>
                                        <td class="text-center">{{ $customer->dia_chi }}</td>
                                        <td>{{ $customer->so_dien_thoai }}</td>
                                        <td class="text-center">{{ $customer->nguon }}</td>
                                        <td>{{ date('d/m/Y', strtotime($customer->ngay_mua)) }}</td>
                                        <td>{{ $customer->loai_xe }}</td>
                                        <td class="text-center">{{ $customer->mau_xe }}</td>
                                        <td>{{ $customer->so_khung }}</td>
                                        <td>{{ $customer->so_may }}</td>
                                        <td class="text-center">{{ $customer->cua_hang }}</td>
                                        <td class="text-center">{{ $customer->nhan_vien }}</td>
                                        <td class="text-center">{{ $customer->showroom }}</td>
                                        <td class="text-center">{{ $customer->carelogs }}</td>
                                    </tr>
                                </div>
                            </div>
                        </div>
                    @endif                    
                @endforeach
            </div>
        </tbody>
    </table>  
    {{-- $customers->onEachSide(2)->links() --}}
</div>
@production
    <h3>Đang thử nghiệm trên môi trường production.</h3>
@endproduction