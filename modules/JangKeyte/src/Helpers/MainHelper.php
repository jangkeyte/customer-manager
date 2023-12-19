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

/**
 * checkRoute.
 *
 * @return void
 */
if (! function_exists('checkEmpty')) {
    function checkEmpty($value)
    {
        if(isset($value) && $value != null && $value != ''){
            return true;
        } else {
            return false;
        }
    }
}

/**
 * routeAction.
 *
 * @return void
 */
if (! function_exists('routeAction')) {
    function routeAction($action, $method='get', $routeName='')
    {
        // Kiểm tra nếu có truyền tên route thì lấy tên route, nếu không thì tự lấy từ route prefix
        $route = $routeName == '' ? substr(Route::current()->getPrefix(), 1) : $routeName;

        // Phương thức mặc định là "get" thì theo quy chuẩn gọi tên route trước action
        if($method == 'get') {
            return $route . '.' . $action;
        } else {
            return $action . '.' . $route;
        }
    }
}

/**
 * formatDate.
 *
 * @return void
 */
if (!function_exists('formatDate')) {
    function formatDate($date, string $format = 'Y/m/d')
    {
        if ($date instanceof \Carbon\Carbon) {
            return $date->format($format);
        }

        return $date;
    }
}