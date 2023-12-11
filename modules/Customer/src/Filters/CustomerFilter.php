<?php

namespace Modules\Customer\src\Filters;

use Modules\JangKeyte\src\Filters;

class CustomerFilter extends QueryFilter
{
    protected $filterable = [
        'cua_hang',
        'nhan_vien',
        'nguon_khach',
        'kenh_lien_he',
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
    
    public function filterFrom($value)
    {
        return $this->builder->where('ngay_nhap', '>=', $value);
    }
    public function filterTo($value)
    {
        return $this->builder->where('ngay_nhap', '<=', $value);
    }
}