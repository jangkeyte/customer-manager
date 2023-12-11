<?php

use Illuminate\Support\ServiceProvider;

return [

    /*
    |--------------------------------------------------------------------------
    | Application Name
    |--------------------------------------------------------------------------
    |
    | This value is the name of your application. This value is used when the
    | framework needs to place the application's name in a notification or
    | any other location as required by the application or its packages.
    |
    */

    'module_name' => 'Authetication',

    'table_prefix' => 'ktgiang_',

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
        Modules\Authetication\src\Providers\AutheticationServiceProvider::class,

    ])->toArray(),

    'dropdown_menu' => array([
            'url' => 'detail',
            'icon' => 'fa fa-info',
            'title' => 'Chi tiết',
        ],[
            
        ],[
            'url' => 'update',
            'icon' => 'fa fa-edit',
            'title' => 'Sửa',
            'modal' => array([
                'target' => 'modifyUserModal',
                
            ]),
        ],[
            'url' => 'remove',
            'icon' => 'fa fa-trash',
            'title' => 'Xóa'
        ],
    ),

];
