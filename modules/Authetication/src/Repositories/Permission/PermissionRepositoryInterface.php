<?php

namespace Modules\Authetication\src\Repositories\Permission;

use Illuminate\Http\Request;
use Modules\Authetication\src\Models\Permission;
use Modules\Authetication\src\Repositories\RepositoryInterface;
use Modules\Authetication\src\Http\Requests\Permission\CreatePermissionRequest;
use Modules\Authetication\src\Http\Requests\Permission\UpdatePermissionRequest;
use Throwable;

/**
 * Interface PermissionRepositoryInterface
 *
 * @package Modules\PermissionManager\src\Repositories\Permission
 */
interface PermissionRepositoryInterface extends RepositoryInterface
{        
    /**
     * Create an object
     * @param array $data
     * @return mixed
     */
    public function add($user_id, $role);
}