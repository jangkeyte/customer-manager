<?php

namespace Modules\Customer\src\Repositories;

use Modules\Customer\src\Models\CareLog;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CareLogRepository
{
    
    // Lấy thông tin Khách hàng theo Mã Khách hàng
    public function createNewCareLog($request)
    {
        // Tiến hành insert bản ghi vào database
        return CareLog::create([
            'khach_hang' => $request->khach_hang,
            'nhan_vien' => Auth::user()->username,
            'noi_dung' => $request->noi_dung,
            'loai_cham_soc' => 1,
            'tinh_trang' => $request->tinh_trang,
            'ngay_thuc_hien' => date("Y-m-d H:i:s"),
        ]);    
    }

}