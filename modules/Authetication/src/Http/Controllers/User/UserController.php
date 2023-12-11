<?php

namespace Modules\Authetication\src\Http\Controllers\User;
use Modules\Authetication\src\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Modules\Authetication\src\Repositories\User\UserRepositoryInterface;
use Modules\Authetication\src\Repositories\Permission\PermissionRepositoryInterface;
/*
use Modules\Authetication\src\Models\User;
use Modules\Authetication\src\Http\Requests\Auth\LoginRequest;
use Modules\Authetication\src\Providers\RouteServiceProvider;
*/
class UserController extends Controller
{
    /**
     * @var UserRepositoryInterface
     */
    protected $userRepository;
    protected $permissionRepository;

    /**
     * UserController constructor.
     * 
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository, PermissionRepositoryInterface $permissionRepository)
    {
        $this->middleware('auth'); 
        $this->userRepository = $userRepository;
        $this->permissionRepository = $permissionRepository;
    }

    /**
     * Display the dashboard view.
     */
    public function create(Request $request): View
    {
        $users = $this->userRepository->all();
        if (view()->exists('Authetication::user.home')) {
            return view('Authetication::user.home', [
                'users' => $users,
            ]);
        }
    }

    /**
     * Display the detail view.
     */
    public function show($id): View
    {
        $user = $this->userRepository->find($id);
        $permissions = $this->permissionRepository->all();
        
        return view('Authetication::user.detail', [
            'user' => $user,
            'permissions' => $permissions,
        ]);
    }

    /**
     * Display the detail view.
     */
    public function destroy($id): RedirectResponse
    {
        $data = $this->userRepository->delete($id);
        return redirect()->route('user')->with('message', 'Xóa tài khoản thành công');
    }

    public function export() 
    {
        return $this->userRepository->export();
    }

    public function exportbycondition(Request $request) 
    {
        return $this->userRepository->exportbycondition();
    }

    /**
     * Display the change password view.
     */
    public function changepwd()
    {
        return view('Authetication::user.changepwd');
    }

    /**
     * Display the update profile view.
     */
    public function update()
    {
        return view('Authetication::user.update');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        if($data['hdAction'] == 'microsoft') {
            return Socialite::driver('microsoft')->redirect();
        } else {
            return 'Đăng nhập bằng tài khoản';
        }
        Auth::login($user, $remember = true);  
    }

    /**
     * Display the login view.
     */
    public function login()
    {
        return view('Authetication::user.login');
    }

    /**
     * Destroy an authenticated session.
     */
    public function logout(Request $request): RedirectResponse
    {
        // Đăng xuất khỏi ứng dụng
        Auth::guard('web')->logout();

        // Hủy session hiện tại
        $request->session()->invalidate();

        // Tạo token mới cho session
        $request->session()->regenerateToken();

        // Chuyển hướng đến trang chủ
        return redirect('/');
    }
}