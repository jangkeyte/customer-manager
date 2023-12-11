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

    'roles' => array([
            'id'   => 1,
            'name' => 'Quản trị viên tối cao',
            'slug' => 'administrator',
            'description' => 'Chúa trời',
            'code' => 'dark',
        ],[
            'id'   => 2,
            'name' => 'Quản trị viên',
            'slug' => 'admin',
            'description' => 'Quản lý toàn bộ hệ thống',
            'code' => 'danger',
        ],[
            'id'   => 3,
            'name' => 'Quản lý',
            'slug' => 'manager',
            'description' => 'Quản lý một đội nhóm gồm nhiều nhóm nhỏ',
            'code' => 'warning',
        ],[
            'id'   => 4,
            'name' => 'Trưởng nhóm',
            'slug' => 'leader',
            'description' => 'Trưởng một nhóm nhân viên, công nhân',
            'code' => 'primary',
        ],[
            'id'   => 5,
            'name' => 'Người dùng',
            'slug' => 'user',
            'description' => 'Người dùng bình thường',
            'code' => 'secondary',
        ],
    ),
    
    'permissions' => array([
            'id'   => 1,
            'name' => 'Tạo mới người dùng',
            'slug' => 'create-user',
            'description' => 'Tạo một người dùng mới bằng những thông tin đưa vào',
            'code' => 'success',
        ],[
            'id'   => 2,
            'name' => 'Sửa thông tin người dùng',
            'slug' => 'update-user',
            'description' => 'Cập nhật thông tin chi tiết người dùng',
            'code' => 'warning',
        ],[
            'id'   => 3,
            'name' => 'Xem thông tin người dùng',
            'slug' => 'view-user',
            'description' => 'Xem thông tin chi tiết người dùng',
            'code' => 'primary',
        ],[
            'id'   => 4,
            'name' => 'Xóa người dùng',
            'slug' => 'delete-user',
            'description' => 'Xóa người dùng chỉ định',
            'code' => 'danger',
        ],[
            'id'   => 11,
            'name' => 'Tạo mới cây xanh',
            'slug' => 'create-tree',
            'description' => 'Tạo mới một cây xanh mới bằng những thông tin đưa vào',
            'code' => 'success',
        ],[
            'id'   => 12,
            'name' => 'Sửa thông tin cây xanh',
            'slug' => 'update-tree',
            'description' => 'Cập nhật thông tin chi tiết cây xanh',
            'code' => 'warning',
        ],[
            'id'   => 13,
            'name' => 'Xem thông tin cây xanh',
            'slug' => 'view-tree',
            'description' => 'Xem thông tin chi tiết cây xanh',
            'code' => 'primary',
        ],[
            'id'   => 14,
            'name' => 'Xóa cây xanh',
            'slug' => 'delete-tree',
            'description' => 'Xóa cây xanh chỉ định',
            'code' => 'danger',
        ]
    ),

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
