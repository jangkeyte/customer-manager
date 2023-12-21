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
/*
use Modules\Authetication\src\Models\User;
use Modules\Authetication\src\Http\Requests\Auth\LoginRequest;
use Modules\Authetication\src\Providers\RouteServiceProvider;
*/
class LoginController extends Controller
{
    /**
     * @var UserRepositoryInterface
     */
    protected $userRepository;

    /**
     * UserController constructor.
     * 
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        //$this->middleware('auth'); 
        $this->userRepository = $userRepository;
    }

    /**
     * Display the dashboard view.
     */
    public function create(Request $request): View
    {
        if(!auth()->check()) {
            return view('Authetication::user.login');
        } else {
            return view('Customer::dashboard');
        }        
    }

    /**
     * Redirect the login action.
     */
    public function login(Request $request): RedirectResponse
    {        
        $data = $request->all();
        $user = $this->userRepository->searchByCondition('username', $request->username);
        if($user){
            if(Hash::check($request->password, $user->password)){
                Auth::login($user, $remember = $request->remember);
                return redirect()->route('user.detail', $user->id);
            }
        }
        return redirect()->route('user.login')->with('message', 'Tên đăng nhập hoặc mật khẩu không đúng!!!');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(Request $request)
    {
        $microsoftUser = Socialite::driver('microsoft')->user();
        $user = $this->userRepository->searchByCondition('email', $microsoftUser->email);
        
        if ($user) {
            $this->userRepository->update($user->id, array('token', $microsoftUser->token));
        } else {
            $user = $this->userRepository->createMsUser($microsoftUser);
        }
        
        Auth::login($user);

        return redirect(route('dashboard'));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
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