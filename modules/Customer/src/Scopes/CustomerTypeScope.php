<?php

namespace Modules\Customer\src\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

class CustomerTypeScope implements Scope
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
        if(Route::current()->getPrefix() == '/customer') {
            $builder->where('loai_khach', 1);
        } else {
            $builder->where('loai_khach', 0);
        }
    }
}