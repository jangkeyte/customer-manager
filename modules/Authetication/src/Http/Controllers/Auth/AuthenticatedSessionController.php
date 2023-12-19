<?php

namespace Modules\Authetication\src\Http\Controllers\Auth;

use Modules\Authetication\src\Models\User;
use Modules\Authetication\src\Http\Controllers\Controller;
use Modules\Authetication\src\Http\Requests\Auth\LoginRequest;
use Modules\Authetication\src\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
//use Laravel\Socialite\Facades\Socialite;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create()
    {
        //return Socialite::driver('microsoft')->redirect();
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(): RedirectResponse
    {
        $microsoftUser = Socialite::driver('microsoft')->user();
        //dd($user);
        $user = User::where('email', $microsoftUser->email)->first();

        if ($user) {
            $user->update([
                'token' => $microsoftUser->token,
            ]);
        } else {
            $user = User::create([
                'uid' => $microsoftUser->id,
                'username' => $microsoftUser->email,
                'name' => $microsoftUser->name,
                'email' => $microsoftUser->email,
                'password' => Hash::make('KTX@12345'),
                'token' => $microsoftUser->token,
            ]);
        }

        Auth::login($user);
        
        return redirect(route('home'));
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