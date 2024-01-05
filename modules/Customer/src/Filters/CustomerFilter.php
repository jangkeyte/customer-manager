<?php

namespace Modules\Customer\src\Filters;

use Modules\JangKeyte\src\Filters\QueryFilter;

class CustomerFilter extends QueryFilter
{
    protected $filterable = [
        'nguon_khach',
        'kenh_lien_he',        
        'cua_hang',
        'nhan_vien',
        'nguon_khach',
        'tinh_trang',  
    ];
    
    public function filterKeyword($value)
    {
        return $this->builder
                    ->where(function ($query) use ($value) {
                        $query->where('ma_khach_hang', 'like', '%' . $value . '%')
                            ->orWhere('ten_khach_hang', 'like', '%' . $value . '%')
                            ->orWhere('so_dien_thoai', 'like', '%' . $value . '%');
                    });
    }
    
    public function filterThoiGian($value)
    {
        return $this->builder->whereYear('ngay_nhap', idate("Y", strtotime($value)))->whereMonth( 'ngay_nhap', idate("m", strtotime($value)));
    }
    public function filterTuNgay($value)
    {
        return $this->builder->where('ngay_nhap', '>=', date("Y-m-d H:i:s", strtotime( $value . " 00:00:00" )));
    }
    public function filterDenNgay($value)
    {
        //dd(date("Y-m-d H:i:s", strtotime( $value . " 23:59:59" )));
        return $this->builder->where('ngay_nhap', '<=', date("Y-m-d H:i:s", strtotime( $value . " 23:59:59" )));
    }
}