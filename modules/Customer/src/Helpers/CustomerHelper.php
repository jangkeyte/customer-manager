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

/**
 * checkRoute.
 *
 * @return void
 */
if (! function_exists('checkRoute')) {
    function checkRoute($name)
    {
        if(Route::current()->getPrefix() == $name){
            return true;
        } else {
            return false;
        }
    }
}

if (!function_exists('formatDate')) {
    function formatDate($date, string $format = 'Y/m/d')
    {
        if ($date instanceof \Carbon\Carbon) {
            return $date->format($format);
        }

        return $date;
    }
}