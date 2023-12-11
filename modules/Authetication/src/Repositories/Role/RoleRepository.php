<?php

namespace Modules\Authetication\src\Repositories\Role;

use Modules\Authetication\src\Models\Role;
use Modules\Authetication\src\Repositories\BaseRepository;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class RoleRepository extends BaseRepository implements RoleRepositoryInterface
{
    /**
     * @var Role
     */
    protected $model;

    /**
     * RoleRepository constructor.
     *
     * @param Role $model
     */
    public function __construct(Role $model)
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