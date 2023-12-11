<?php

namespace Modules\Customer\src\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider\RouteServiceProvider;

use File;

class CustomerServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    private $MODULE_NAME = 'Customer';
    
    public function register() { 

        // Khai báo middleare
        $middleare = [
            // 'key' => 'namespace của middleare'
            $this->MODULE_NAME =>   __DIR__ . '\\' . $this->MODULE_NAME . '\src\Http\Controllers\Middlewares\\' . $this->MODULE_NAME . 'Middleware',
        ];
        foreach ($middleare as $key => $value) {
            $this->app['router']->pushMiddlewareToGroup($key, $value);
        }
        
        // Bind repository cho module Customer
        $authetications = array('Customer', 'Statistics');
        foreach ($authetications as $authetication) {
            $this->app->bind(
                'Modules\Customer\src\Repositories\\' . $authetication . '\\' . $authetication . 'RepositoryInterface',
                'Modules\Customer\src\Repositories\\' . $authetication . '\\' . $authetication . 'Repository'
            );
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
}