<?php

namespace Modules\Authetication\src\Repositories;

use Illuminate\Support\ServiceProvider;

class BackendServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(
            'Modules\Authetication\src\Repositories\Tree\TreeRepositoryInterface',
            'Modules\Authetication\src\Repositories\Tree\TreeRepository'
        );
    }
}