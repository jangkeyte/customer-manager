<?php

namespace Modules\Authetication\src\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $role, $permission = null)
    {
        $can_access = false;
        $roles = explode("|", $role);
        foreach ($roles as $user_role) {
            if($request->user()->hasRole($user_role)) {
                $can_access = true;
            }    
        }

        $have_permission = false;
        if($permission != null) {
            $permissions = explode("|", $permission);
            foreach ($permissions as $user_permission) {
                if($request->user()->can($permission)) {
                    $have_permission = true;
                }
            }
        }

        return $can_access || $have_permission ? $next($request) : abort(401);
    }
}
