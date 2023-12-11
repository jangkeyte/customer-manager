<?php

namespace App\Repositories;

use App\Models\Source;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SourceRepository
{
    // Lấy thông tin cửa hàng theo mã cửa hàng
    public function getSourceByID($id=0)
    {
        return Source::where('uid', $id)->first();
    }

    // Lấy thông danh sách cửa hàng
    public function getSourceList()
    {
        $sourceList = Source::all();
        
        $nguon_khach = array('0' => 'Tất cả');
        if(!empty($sourceList)){
            foreach($sourceList as $source)
            {   
                $nguon_khach[$source->source] = $source->name;
            }
        }
        return $nguon_khach;
    }

    // Lấy danh sách Nguồn khách theo kết quả tư vấn
    public function getSourceListWithCount($loai_khach=0)
    {
        $countBySource = Customer::join('ktgiang_source', 'ktgiang_customer.nguon_khach', '=', 'ktgiang_source.source')
            ->select(DB::raw("COUNT(*) AS so_khach, nguon_khach, ktgiang_source.name"))
            ->GetCustomerByRole()
            ->SauBan($loai_khach)
            ->Deleted(0)
            ->groupBy('nguon_khach', 'ktgiang_source.name')
            ->get();

        $nguon_khach = array('0' => 'Tất cả - [' . $countBySource->sum('so_khach') . ']');
        if(!empty($countBySource)){
            foreach($countBySource as $c_source)
            {   
                $nguon_khach[$c_source->nguon_khach] = $c_source->name . ' - [' . $c_source->so_khach . ']';
            }
        }
        return $nguon_khach;
    }
}