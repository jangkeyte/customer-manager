<?php

namespace Modules\Authetication\src\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider\RouteServiceProvider;

use File;

class AutheticationServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    private $MODULE_NAME = 'Authetication';
    private $module_path = __DIR__ . '/../../';
    
    public function register() 
    { 
        // Khai báo middleare
        $middleare = [
            // 'key' => 'namespace của middleare'
            $this->MODULE_NAME =>   __DIR__ . '\\' . $this->MODULE_NAME . '\src\Http\Controllers\Middlewares\\' . $this->MODULE_NAME . 'Middleware',
        ];
        foreach ($middleare as $key => $value) {
            $this->app['router']->pushMiddlewareToGroup($key, $value);
        }
           
        // Khai báo configs
        if (File::exists( $this->module_path . 'config/app.php' )) {  
            $this->publishes([
                $this->module_path . 'config/app.php' => 'App/config/' . $this->MODULE_NAME . '.php',
            ], 'config');
            $this->mergeConfigFrom(
                $this->module_path . 'config/app.php', strtolower($this->MODULE_NAME)
            );
        }

        // Bind repository cho module Authetication
        $authetications = array('User', 'Role', 'Permission');
        foreach ($authetications as $authetication) {
            $this->app->bind(
                'Modules\Authetication\src\Repositories\\' . $authetication . '\\' . $authetication . 'RepositoryInterface',
                'Modules\Authetication\src\Repositories\\' . $authetication . '\\' . $authetication . 'Repository'
            );
        }
        
    }

    public function boot()
    {        
        Blade::componentNamespace('Modules\\' . $this->MODULE_NAME . '\\src\\View\\Components', strtolower($this->MODULE_NAME));
        
        // Khai báo routes
        if (File::exists( $this->module_path . 'routes' )) {
            // Tất cả files có tại thư mục routes
            $route_dir = File::allFiles( $this->module_path . 'routes' );
            foreach ( $route_dir as $key => $value ) {
                $file = $value->getPathName();                
                $this->loadRoutesFrom( $file );
            }            
        }
        
        // Khai báo views
        if (File::exists( $this->module_path . 'resources/views')) {
            // Để gọi view thì ta sử dụng namespace ở phía trước, ví dụ module Demo: view('Demo::index'), @extends('Demo::index'), @include('Demo::index')
            $this->loadViewsFrom( $this->module_path . 'resources/views', $this->MODULE_NAME );
        }
        $this->publishes([
            $this->module_path . 'resources/views' => resource_path("views"),
            $this->module_path . 'resources/assets' => public_path("assets")
        ]);
    
        // Khai báo migration
        if (File::exists( $this->module_path . 'database/migrations' )) {
            // Toàn bộ file migration của modules sẽ tự động được load
            $this->loadMigrationsFrom( $this->module_path . 'database/migrations');
        }
    
        // Khai báo languages
        if (File::exists( $this->module_path . 'resources/lang' )) {
            // Đa ngôn ngữ theo file php
            // Dùng đa ngôn ngữ tại file php resources/lang/en/general.php : @lang('Demo::general.hello')
            $this->loadTranslationsFrom( $this->module_path . 'resources/lang', $this->MODULE_NAME );
            // Đa ngôn ngữ theo file json
            $this->loadJSONTranslationsFrom( $this->module_path . 'resources/lang');
        }
    
        // Khai báo helpers
        if (File::exists( $this->module_path . 'helpers' )) {
            // Tất cả files có tại thư mục helpers
            $helper_dir = File::allFiles( $this->module_path . 'helpers' );
            // khai báo helpers
            foreach ( $helper_dir as $key => $value ) {
                $file = $value->getPathName();
                require $file;
            }
        }
    }
}