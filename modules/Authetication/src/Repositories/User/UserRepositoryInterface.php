<?php

namespace Modules\Authetication\src\Repositories\User;

use Illuminate\Http\Request;
use Modules\Authetication\src\Models\User;
use Modules\Authetication\src\Repositories\RepositoryInterface;
use Modules\Authetication\src\Http\Requests\User\CreateUserRequest;
use Modules\Authetication\src\Http\Requests\User\UpdateUserRequest;
use Throwable;

/**
 * Interface UserRepositoryInterface
 *
 * @package Modules\UserManager\src\Repositories\User
 */
interface UserRepositoryInterface extends RepositoryInterface
{
    public function createUser(CreateUserRequest $request);

    /**
     * Create an user
     * @param array $data
     * @return mixed
     */
    public function createMsUser($microsoftUser);

    /**
     * Update an user
     * @param int $id
     * @param array $data
     * @return mixed
     */
    public function updateUser(UpdateUserRequest $request);
    
    /**
     * Get's list of user by condition
     *
     * @param array
     */
    public function search(Request $request);

    /**
     * Get an user by condition
     *
     * @param array
     */
    public function searchByCondition($key, $value);

    /**
     * Export all user
     *
     * @return bool
     */
    public function export();
    
    /**
     * Export list of user by condition
     *
     * @param condition
     * @return bool
     */
    public function exportByCondition(Request $request);

    /**
     * Import users from file upload
     *
     * @param request
     * @return bool
     */
    public function import(Request $request);
    
}