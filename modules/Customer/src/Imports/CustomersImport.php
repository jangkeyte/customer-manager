<?php

namespace Modules\Customer\src\Imports;

use Modules\Customer\src\Models\Customer;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

use Illuminate\Support\Collection;

class CustomersImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            Customer::create([
                'ma_khach_hang' => $row['ma_khach_hang'] ?? uniqid(),
                'ten_khach_hang' => $row['ten_khach_hang'],
                'so_dien_thoai' => str_replace(' ', '', $row['so_dien_thoai']),
                'gioi_tinh' => $row['gioi_tinh'] ?? config('customer.default.gioi_tinh'),
                'thong_tin_lien_he' => $row['thong_tin_lien_he'] ?? config('customer.default.thong_tin_lien_he'),
                'dia_chi' => $row['dia_chi'] ??  config('customer.default.dia_chi'),
                'nguon_khach' => $row['nguon_khach'] ?? config('customer.default.nguon_khach'),
                'kenh_lien_he' => $row['kenh_lien_he'] ?? config('customer.default.kenh_lien_he'),
                'cach_lay_so' => $row['cach_lay_so'] ?? config('customer.default.cach_lay_so'),
                'loai_xe' => $row['loai_xe'] ?? config('customer.default.loai_xe'),
                'thoi_gian_nhan' => $row['thoi_gian_nhan'] != '' ? date("Y-m-d H:i:s", strtotime($row['thoi_gian_nhan'])) : date('Y-m-d H:i:s'),
                'thoi_gian_chuyen' => $row['thoi_gian_chuyen'] != '' ? date("Y-m-d H:i:s", strtotime($row['thoi_gian_chuyen'])) : date('Y-m-d H:i:s'),
                'nguoi_chuyen' => $row['nguoi_chuyen'] ?? (config('customer.default.nguoi_chuyen') ?? auth()->user()->staff->ma_nhan_vien),
                'nhu_cau' => $row['nhu_cau'] ?? config('customer.default.nhu_cau'),
                'so_khung' => $row['so_khung'] ?? NULL,
                'so_may' => $row['so_may'] ?? NULL,
                'mau_xe' => $row['mau_xe'] ?? NULL,
                'nhan_vien' => $row['nhan_vien'] ?? (config('customer.default.nhan_vien') ?? auth()->user()->staff->ma_nhan_vien),
                'cua_hang' => $row['cua_hang'] ?? (config('customer.default.cua_hang') ?? auth()->user()->staff->cua_hang),
                'tinh_trang' => $row['tinh_trang'] ?? 0,
                'loai_khach' => $row['loai_khach'] ?? 0,
                'ngay_nhap' => date("Y-m-d", strtotime($row['thoi_gian_nhan'])) ?? date('Y-m-d H:i:s'), 
                'ghi_chu' => $row['ghi_chu'] ?? config('customer.default.ghi_chu')
            ]);
        }
    }
}
