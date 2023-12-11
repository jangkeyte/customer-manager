<?php

namespace Modules;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\ServiceProvider\RouteServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Log;

//use Modules\JangKeyte\src\Models\Authetication;
//use Modules\TreeManager\src\Models\Observers\AutheticationObserver;

use File;

class ModuleServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/home';
    public const CUSTOMER = '/customer';
    
    public function register() { 

        $this->app->register('Modules\JangKeyte\src\Providers\JangKeyteServiceProvider');
        $this->app->register('Modules\Authetication\src\Providers\AutheticationServiceProvider');
        $this->app->register('Modules\Authetication\src\Providers\PermissionsServiceProvider');
        $this->app->register('Modules\Customer\src\Providers\CustomerServiceProvider');
        /*
        // Đăng ký app theo cấu trúc thư mục
        $directories = array_map('basename', File::directories(__DIR__));
        foreach ($directories as $moduleName) {
            $this->registerNewApp($moduleName);
        }
        
        */
    }

    public function boot()
    {
        /*
        // Đăng ký modules theo cấu trúc thư mục
        $directories = array_map('basename', File::directories(__DIR__));
        foreach ($directories as $moduleName) {
            //Blade::anonymousComponentPath('/modules/CustomerManager/resources/views/components');
            Blade::componentNamespace('Modules\\' . $moduleName . '\\src\\View\\Components', strtolower($moduleName));
            $this->registerModule($moduleName);
        }        

        //Customer::observe(CustomerObserver::class);
        */
    }
    /*
    // Khai báo đăng ký cho từng modules
    private function registerModule($moduleName) {
        $modulePath = __DIR__ . "/$moduleName/";
        
        // Khai báo routes
        if (File::exists($modulePath . "routes")) {
            // Tất cả files có tại thư mục routes
            $route_dir = File::allFiles($modulePath . "routes");
            foreach ($route_dir as $key => $value) {
                $file = $value->getPathName();
                $this->loadRoutesFrom($file);
            }
        }
        
        // Khai báo views - sử dụng namespace ở phía trước để gọi view, ví dụ module Demo: view('Demo::index'), @extends('Demo::index'), @include('Demo::index')
        if (File::exists($modulePath . "resources/views")) {
            $this->loadViewsFrom($modulePath . "resources/views", $moduleName);
        }

        $this->publishes([
            $modulePath . 'resources/views' => resource_path('views'),
            $modulePath . 'resources/assets' => public_path('assets')
        ]);
    
        // Khai báo migration
        if (File::exists($modulePath . "database/migrations")) {
            // Toàn bộ file migration của modules sẽ tự động được load
            $this->loadMigrationsFrom($modulePath . "database/migrations");
        }
    
        // Khai báo languages
        if (File::exists($modulePath . "resources/lang")) {
            // Đa ngôn ngữ theo file php
            // Dùng đa ngôn ngữ tại file php resources/lang/en/general.php : @lang('Demo::general.hello')
            $this->loadTranslationsFrom($modulePath . "resources/lang", $moduleName);
            // Đa ngôn ngữ theo file json
            $this->loadJSONTranslationsFrom($modulePath . 'resources/lang');
        }
    
        // Khai báo helpers
        if (File::exists($modulePath . "helpers")) {
            // Tất cả files có tại thư mục helpers
            $helper_dir = File::allFiles($modulePath . "helpers");
            // khai báo helpers
            foreach ($helper_dir as $key => $value) {
                $file = $value->getPathName();
                require $file;
            }
        }
    }
    */
    /**
     * register CustomerRepository
     *
     * @return void
     */
    public function registerNewApp($appName)
    {
        $modulePath = __DIR__ . "/$appName/";

        // Khai báo configs
        if (File::exists( $modulePath . "config/app.php")) {            
            $this->publishes([
                $modulePath . 'config/app.php' => __DIR__ . '/../config/' .$appName . '.php',
            ], 'config');
            $this->mergeConfigFrom(
                $modulePath . 'config/app.php', strtolower($appName)
            );
        }
        /*
        $configFile = [
            $appName => __DIR__. '\\' . $appName . '\configs\app.php',
        ];
        foreach ($configFile as $alias => $path) {
            $this->mergeConfigFrom($path, $alias);
        }
        */

        // Khai báo middleare
        $middleare = [
            // 'key' => 'namespace của middleare'
            $appName =>   __DIR__. '\\' . $appName . '\src\Http\Controllers\Middlewares\\' . $appName . 'Middleware',
        ];
        foreach ($middleare as $key => $value) {
            $this->app['router']->pushMiddlewareToGroup($key, $value);
        }

        /*
        // Khai báo commands
        $this->commands([
            // namespace của commands đặt tại đây
            '\modules\CustomerManager\src\Http\Commands\CustomerManagerCommand'
        ]);
        */
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