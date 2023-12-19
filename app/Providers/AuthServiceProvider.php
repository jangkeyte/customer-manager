<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        /*
        try {
            UserRole::get(['key_name', 'key_message'])->map(function ($permission) {
              Gate::define($permission->key_name, function($user) use($permission) {
                return $user->hasRole($permission->key_name) 
                  ? Response::allow() 
                  : Response::deny($permission->key_message);
              });
            });
        } catch (\Exception $e) {
            Return [];
        }
        */
    }
}
