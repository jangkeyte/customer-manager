<?php

namespace Modules\JangKeyte\src\Traits;

use Modules\JangKeyte\src\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Builder;

trait Filterable
{
    public function scopeFilter(Builder $builder, QueryFilter $filters, array $filterFields = ['*'], array $orderFields = [])
    {
        return $filters->apply($builder, $filterFields, $orderFields);
    }
}