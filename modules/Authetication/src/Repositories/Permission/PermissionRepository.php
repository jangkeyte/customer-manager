<?php

namespace Modules\Authetication\src\Repositories\Permission;

use Modules\Authetication\src\Models\Permission;
use Modules\Authetication\src\Repositories\BaseRepository;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class PermissionRepository extends BaseRepository implements PermissionRepositoryInterface
{
    /**
     * @var Permission
     */
    protected $model;

    /**
     * PermissionRepository constructor.
     *
     * @param Permission $model
     */
    public function __construct(Permission $model)
    {
        parent::__construct($model);
    }

    /**
     * Create an object
     * @param array $data
     * @return mixed
     */
    public function add($user_id, $role)
    {
        return $user->roles()->attach($role);
    }

}