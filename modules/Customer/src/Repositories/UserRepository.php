<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserRepository
{
    // Lấy thông tin nhân viên theo mã nhân viên
    public function getUserByID($id=0)
    {
        return User::where('ma_nhan_vien', $id)->first();
    }

    // Lấy thông danh sách nhân viên
    public function getUserList()
    {
        $userList = User::all();
        
        $nhan_vien = array('0' => 'Tất cả');
        if(!empty($userList)){
            foreach($userList as $user)
            {   
                $nhan_vien[$user->ma_nhan_vien] = $user->ten_nhan_vien;
            }
        }
        return $nhan_vien;
    }

    // Lấy danh sách nhân viên với số lượng Khách hàng
    public function getUserListWithCount($loai_khach=0)
    {
        $countByUser = Customer::join('ktgiang_user', 'ktgiang_customer.nhan_vien', '=', 'ktgiang_user.ma_nhan_vien')
            ->select(DB::raw("COUNT(*) AS so_khach, nhan_vien, ktgiang_user.ten_nhan_vien"))
            ->GetCustomerByRole()
            ->SauBan($loai_khach)
            ->Deleted(0)
            ->groupBy('nhan_vien', 'ktgiang_user.ten_nhan_vien')
            ->get();

        $nhan_vien = array('0' => 'Tất cả - [' . $countByUser->sum('so_khach') . ']');
        if(!empty($countByUser)){
            foreach($countByUser as $c_user)
            {   
                $nhan_vien[$c_user->nhan_vien] = $c_user->ten_nhan_vien . ' - [' . $c_user->so_khach . ']';
            }
        }
        return $nhan_vien;
    }
}