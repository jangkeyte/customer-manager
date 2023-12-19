<?php

namespace Modules\Customer\src\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\Auth;

class CustomerByRoleScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @param \Illuminate\Database\Eloquent\Model $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {        
        //dd(auth()->user()->hasRole('leader'));
        if(Auth::user()->hasRole('manager|admin|administrator')){
            $builder;
        } elseif(Auth::user()->hasRole('leader')) {
            $builder->where( 'ktgiang_customer.cua_hang', auth()->user()->staff->cua_hang );
        } elseif(Auth::user()->hasRole('user')) {
            //dd(auth()->user()->staff);
            $builder->where( 'nhan_vien', auth()->user()->staff->ma_nhan_vien );
        } else {
            return;
        }
    }
}