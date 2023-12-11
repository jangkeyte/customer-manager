<?php

namespace App\Repositories;

use App\Models\Store;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class StoreRepository
{
    // Lấy thông tin cửa hàng theo mã cửa hàng
    public function getStoreByID($id=0)
    {
        return Store::where('uid', $id)->first();
    }

    // Lấy thông danh sách cửa hàng
    public function getStoreList()
    {
        $storeList = Store::all();
        
        $cua_hang = array('0' => 'Tất cả');
        if(!empty($storeList)){
            foreach($storeList as $store)
            {   
                $cua_hang[$store->uid] = $store->name;
            }
        }
        return $cua_hang;
    }

    // Lấy danh sách cửa hàng với số lượng Khách hàng
    public function getStoreListWithCount($loai_khach=0)
    {
        $countByStore = Customer::join('ktgiang_store', 'ktgiang_customer.cua_hang', '=', 'ktgiang_store.uid')
            ->select(DB::raw("COUNT(*) AS so_khach, cua_hang, ktgiang_store.name"))
            ->GetCustomerByRole()
            ->SauBan($loai_khach)
            ->Deleted(0)
            ->groupBy('cua_hang', 'ktgiang_store.name')
            ->get();

        $cua_hang = array('0' => 'Tất cả - [' . $countByStore->sum('so_khach') . ']');
        if(!empty($countByStore)){
            foreach($countByStore as $c_store)
            {   
                $cua_hang[$c_store->cua_hang] = $c_store->name . ' - [' . $c_store->so_khach . ']';
            }
        }
        return $cua_hang;
    }

}