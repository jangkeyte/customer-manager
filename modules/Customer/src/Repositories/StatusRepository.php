<?php

namespace App\Repositories;

use App\Models\Status;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class StatusRepository
{
    // Lấy thông tin trạng thái theo mã trạng thái
    public function getStatusByID($id=0)
    {
        return Status::where('uid', $id)->first();
    }

    // Lấy thông danh sách trạng thái
    public function getStatusList()
    {
        $statusList = Status::all();
        
        $trang_thai = array('0' => 'Tất cả');
        if(!empty($statusList)){
            foreach($statusList as $status)
            {   
                $trang_thai[$status->status] = $status->name;
            }
        }
        return $trang_thai;
    }

    // Lấy danh sách Khách hàng theo kết quả tư vấn
    public function getStatusListWithCount($loai_khach=0)
    {
        $countByStatus = Customer::join('ktgiang_status', 'ktgiang_customer.tinh_trang', '=', 'ktgiang_status.status')
            ->select(DB::raw("COUNT(*) AS so_khach, tinh_trang, ktgiang_status.name"))
            ->GetCustomerByRole()
            ->SauBan($loai_khach)
            ->Deleted(0)
            ->groupBy('tinh_trang', 'ktgiang_status.name')
            ->get();

        $tinh_trang = array('0' => 'Tất cả - [' . $countByStatus->sum('so_khach') . ']');
        if(!empty($countByStatus)){
            foreach($countByStatus as $c_status)
            {   
                $tinh_trang[$c_status->tinh_trang] = $c_status->name . ' - [' . $c_status->so_khach . ']';
            }
        }
        return $tinh_trang;
    }
}