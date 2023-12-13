<?php

use Illuminate\Support\ServiceProvider;

return [

    'module_name' => 'Customer',

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
        Modules\Customer\src\Providers\CustomerServiceProvider::class,

    ])->toArray(),

];
