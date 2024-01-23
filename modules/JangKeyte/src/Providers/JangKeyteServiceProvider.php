<?php

namespace Modules\JangKeyte\src\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider\RouteServiceProvider;

use File;

class JangKeyteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    private $MODULE_NAME = 'JangKeyte';
    
    public function register() { 

        // Khai báo middleare
        $middleare = [
            // 'key' => 'namespace của middleare'
            $this->MODULE_NAME =>   __DIR__ . '\\' . $this->MODULE_NAME . '\src\Http\Controllers\Middlewares\\' . $this->MODULE_NAME . 'Middleware',
        ];
        foreach ($middleare as $key => $value) {
            $this->app['router']->pushMiddlewareToGroup($key, $value);
        }
    }

    public function boot()
    {        
        Blade::componentNamespace('Modules\\' . $this->MODULE_NAME . '\\src\\View\\Components', strtolower($this->MODULE_NAME));
        
        // Khai báo routes
        if (File::exists( __DIR__ . "/../../routes" )) {
            // Tất cả files có tại thư mục routes
            $route_dir = File::allFiles( __DIR__ . "/../../routes" );
            foreach ( $route_dir as $key => $value ) {
                $file = $value->getPathName();                
                $this->loadRoutesFrom( $file );
            }            
        }
        
        // Khai báo views
        if (File::exists( __DIR__ . "/../../resources/views")) {
            // Để gọi view thì ta sử dụng namespace ở phía trước, ví dụ module Demo: view('Demo::index'), @extends('Demo::index'), @include('Demo::index')
            $this->loadViewsFrom( __DIR__ . "/../../resources/views", $this->MODULE_NAME );
        }

        $this->publishes([
            __DIR__ . "/../../resources/views" => resource_path("views"),
            __DIR__ . "/../../resources/assets" => public_path("assets")
        ]);
    
        // Khai báo migration
        if (File::exists( __DIR__ . "/../../database/migrations" )) {
            // Toàn bộ file migration của modules sẽ tự động được load
            $this->loadMigrationsFrom(__DIR__ . "../../database/migrations");
        }
    
        // Khai báo languages
        if (File::exists( __DIR__ . "/../../resources/lang" )) {
            // Đa ngôn ngữ theo file php
            // Dùng đa ngôn ngữ tại file php resources/lang/en/general.php : @lang('Demo::general.hello')
            $this->loadTranslationsFrom( __DIR__ . "/../../resources/lang", $this->MODULE_NAME );
            // Đa ngôn ngữ theo file json
            $this->loadJSONTranslationsFrom(__DIR__ . "/../../resources/lang");
        }
    
        // Khai báo helpers
        if (File::exists( __DIR__ . "/../../helpers" )) {
            // Tất cả files có tại thư mục helpers
            $helper_dir = File::allFiles( __DIR__ . "/../../helpers" );
            // khai báo helpers
            foreach ( $helper_dir as $key => $value ) {
                $file = $value->getPathName();
                require $file;
            }
        }
    }
    
    protected function rootBoot()
    {        
        $this->loadViewsFrom(__DIR__ . '/JangKeyte/resources/views', 'JangKeyte');
        $this->publishes([
            __DIR__.'/JangKeyte/resources/views/commons' => resource_path('views/commons'),
        ], 'jangkeyte-commons');

        $this->publishes([
            __DIR__.'/JangKeyte/resources/views/templates' => resource_path('views/templates'),
        ], 'jangkeyte-templates');

        Paginator::defaultView('JangKeyte::commons.paginator');
        Paginator::defaultSimpleView('JangKeyte::commons.simple_paginator');

        Blade::directive('ocb', function () {
            return '<?php echo "{{ " ?>';
        });

        Blade::directive('ccb', function () {
            return '<?php echo " }}" ?>';
        });
    }
}