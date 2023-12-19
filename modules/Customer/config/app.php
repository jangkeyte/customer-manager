<?php

use Illuminate\Support\ServiceProvider;

return [

    'module_name' => 'Customer',

    'table_prefix' => 'ktgiang_',

    'default' => [
        'gioi_tinh' => '0',
        'thong_tin_lien_he' => null,
        'dia_chi' => '1',
        'nguon_khach' => '12',
        'kenh_lien_he' => '3',
        'cach_lay_so' => '1',
        'loai_xe' => 'sprint-125',
        'nguoi_chuyen' => null,
        'nhu_cau' => null,
        'nhan_vien' => null,
        'cua_hang' => null,
        'ghi_chu' => null
    ],
    
    /*
    |--------------------------------------------------------------------------
    | Autoloaded Service Providers
    |--------------------------------------------------------------------------
    |
    | The service providers listed here will be automatically loaded on the
    | request to your application. Feel free to add your own services to
    | this array to grant expanded functionality to your applications.
    |
    */

    'providers' => ServiceProvider::defaultProviders()->merge([
        /*
         * Package Service Providers...
         */
        Modules\Customer\src\Providers\CustomerServiceProvider::class,

    ])->toArray(),

];
