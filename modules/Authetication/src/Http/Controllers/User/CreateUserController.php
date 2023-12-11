<?php

namespace Modules\Authetication\src\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Modules\Authetication\src\Http\Requests\User\CreateUserRequest;
use Modules\Authetication\src\Models\User;
use Modules\Authetication\src\Repositories\User\UserRepositoryInterface;
use Modules\Authetication\src\Repositories\Role\RoleRepositoryInterface;
use Modules\Authetication\src\Repositories\Permission\PermissionRepositoryInterface;

class CreateUserController extends Controller
{
    /**
     * @var UserRepositoryInterface
     */
    protected $userRepository;
    protected $roleRepository;
    protected $permissionRepository;

    /**
     * UserController constructor.
     * 
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository, RoleRepositoryInterface $roleRepository, PermissionRepositoryInterface $permissionRepository)
    {
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
        $this->permissionRepository = $permissionRepository;
    }

    /**
     * Display the login view.
     */
    public function create(): View
    {            
        $roles = $this->roleRepository->all();
        $permissions = $this->permissionRepository->all();
        return view('Authetication::user.create', [
            'roles' => $roles,
            'permissions' => $permissions,
        ]);
    }

    /**
     * Handle an incoming POST request.
     */
    public function store(CreateUserRequest $request): RedirectResponse
    {
        $user = $this->userRepository->createUser($request);
        if($request->role != null) {
            $role = $this->roleRepository->find($request->role);
            $user->roles()->attach($role);
        }
        
        if($request->permission != null) {
            
            foreach($request->permission as $permission) {
                if(!$user->can($permission)) {
                    $user->givePermissionsTo($permission);
                }
            }
            
            /*
            foreach($request->permission as $permission){
                $perm = $this->roleRepository->find($permission);
                $user->permissions()->attach($permission);
            }
            */
        }
        
        if($user->id != '')
        {
            $message = 'Thêm mới nhân viên thành công!!!';
        } else {
            $message = 'Thêm mới nhân viên thất bại.';
        }
        return redirect()->route('user')->with('message', $message);
    }

}
