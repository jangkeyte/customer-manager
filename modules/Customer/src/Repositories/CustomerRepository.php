<?php

namespace Modules\Customer\src\Repositories;

use Modules\Customer\src\Models\Customer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CustomerRepository
{
    // Lấy thông tin Khách hàng theo Mã Khách hàng
    public function getCustomerByID($ma_khach_hang=0)
    {
        dd($ma_khach_hang);
        return Customer::where('ma_khach_hang', $ma_khach_hang)->Deleted(0)->first();
    }

    // Cập nhật trạng thái Khách hàng theo Mã Khách hàng
    public function updateCustomerStatusByID($ma_khach_hang, $tinh_trang=0)
    {
        return Customer::where('ma_khach_hang', $ma_khach_hang)->update(['tinh_trang' => $tinh_trang]);
    }

    // Cập nhật trạng thái Khách hàng theo Mã Khách hàng
    public function updateCustomerByID($ma_khach_hang, $khach_hang)
    {
        $ngay_lien_he_mua = $khach_hang->loai_khach ? 'ngay_mua' : 'ngay_lien_he';
        return Customer::where('ma_khach_hang', $ma_khach_hang)->update([
            'ten_khach_hang' => $khach_hang->ten_khach_hang,
            'gioi_tinh' => $khach_hang->gioi_tinh,
            'dia_chi' => $khach_hang->dia_chi,
            'so_dien_thoai' => $khach_hang->so_dien_thoai,
            'nguon_khach' => $khach_hang->nguon_khach,
            $ngay_lien_he_mua => $khach_hang->$ngay_lien_he_mua,
            'loai_xe' => $khach_hang->loai_xe,
            'mau_xe' => $khach_hang->mau_xe,
            'so_khung' => isset($khach_hang->so_khung) ? $khach_hang->so_khung : '',
            'so_may' => isset($khach_hang->so_may) ? $khach_hang->so_may : '',
            'nhan_vien' => $khach_hang->nhan_vien,
            'cua_hang' => $khach_hang->cua_hang,
            'ghi_chu' => $khach_hang->ghi_chu
        ]);
    }

    // Xóa Khách hàng theo Mã Khách hàng
    public function deleteCustomerByID($ma_khach_hang, $deleted=1)
    {
        return Customer::where('ma_khach_hang', $ma_khach_hang)->update(['deleted' => $deleted]);
    }

    // Lấy danh sách Khách hàng theo từ khóa tìm kiếm
    public function getCustomersByKeyword($loai_khach, $keyword)
    {
        return Customer::Deleted(0)->GetCustomerByRole()->TimNhanh($keyword)->get();
    }

    // Lấy danh sách Khách hàng theo điều kiện đưa vào
    public function getCustomersByConditions($keyword="", $tinh_trang=0, $thoi_gian=0, $tu_ngay=0, $den_ngay=0, $cua_hang=0, $nhan_vien=0, $nguon_khach=0, $sap_xep='', $sap_xep_theo='desc')
    {
        return Customer::Deleted(0)
            ->GetCustomerByRole()
            ->KhachShowroom($cua_hang)
            ->KhachNhanVien($nhan_vien)
            ->TinhTrang($tinh_trang)
            ->NguonKhach($nguon_khach)
            ->TrongThang($thoi_gian, $loai_khach)
            ->TuNgay($tu_ngay, $loai_khach)
            ->DenNgay($den_ngay, $loai_khach)
            ->TimTuKhoa($keyword)
            ->SapXepTheo($sap_xep, $sap_xep_theo)
            ->paginate(100);
    }

    // Lấy danh sách Khách hàng theo nhân viên
    public function getCustomersByUser($loai_khach=0)
    {
        return Customer::Deleted(0)->GetCustomerByRole()->orderBy('ngay_lien_he', 'desc')->paginate(20);
    }

    // Lấy danh sách Khách hàng theo tháng năm
    public function getDateOfCustomers($loai_khach=0)
    {
        /*
        $ngay_them = $loai_khach ? 'ngay_mua' : 'ngay_lien_he';

        $countByDate = Customer::select(DB::raw("COUNT(*) AS so_khach, DATE_FORMAT(" . $ngay_them . ",'%Y-%m') AS thoi_gian"))
            ->GetCustomerByRole()
            ->SauBan($loai_khach)
            ->Deleted(0)
            ->groupBy('thoi_gian')
            ->get();

        $thoi_gian = array('0' => 'Tất cả');
        if(!empty($countByDate)){
            foreach($countByDate as $c_date)
            {   
                $year_month = explode('-', $c_date->thoi_gian);
                $thoi_gian[$c_date->thoi_gian] = $year_month[1] . '/' . $year_month[0] . ' - [' . $c_date->so_khach . ']';
            }
        }
        
        return $thoi_gian;
        */
    }

}