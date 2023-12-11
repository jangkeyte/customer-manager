<?php
use Illuminate\Support\Facades\DB;
use App\Models\Customer;

/**
 * Hiển thị kết quả trả về json
 */
 if (! function_exists('showResult')) {
    function showResult($data){
        return response()->json($data);
    }
 }

/**
 * getCustomerByDate.
 *
 * @return void
 */
if (! function_exists('getCustomerByDate')) {
    function getCustomerByDate($loai_khach)
    {   
        
    }
}

/**
 * getCustomerByStatus.
 *
 * @return void
 */
if (! function_exists('getCustomerByStatus')) {
    function getCustomerByStatus($loai_khach)
    {
        
    }
}