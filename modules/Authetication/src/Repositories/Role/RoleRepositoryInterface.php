<?php

namespace Modules\Authetication\src\Repositories\Role;

use Illuminate\Http\Request;
use Modules\Authetication\src\Models\Role;
use Modules\Authetication\src\Repositories\RepositoryInterface;
use Modules\Authetication\src\Http\Requests\Role\CreateRoleRequest;
use Modules\Authetication\src\Http\Requests\Role\UpdateRoleRequest;
use Throwable;

/**
 * Interface RoleRepositoryInterface
 *
 * @package Modules\RoleManager\src\Repositories\Role
 */
interface RoleRepositoryInterface extends RepositoryInterface
{        
    /**
     * Create an object
     * @param array $data
     * @return mixed
     */
    public function add($user_id, $role);
}