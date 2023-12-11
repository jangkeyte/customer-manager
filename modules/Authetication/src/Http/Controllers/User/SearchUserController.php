<?php

namespace Modules\Authetication\src\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Modules\Authetication\src\Models\User;
use Modules\Authetication\src\Http\Requests\User\SearchUserRequest;
use Modules\Authetication\src\Repositories\User\UserRepositoryInterface;

class SearchUserController extends Controller
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
        $this->userRepository = $userRepository;
    }

    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('JangKeyte::errors.not_found');
    }

    /**
     * Handle an incoming POST request.
     */
    public function store(Request $request)//: RedirectResponse
    {
        //DB::enableQueryLog(); 
        $data = $request->all();
        if($data["hdAction"] == 'export') {
            return $this->userRepository->export();
        } elseif($data["hdAction"] == 'exportByCondition') {
            return $this->userRepository->exportByCondition($request);
        } else {
            $users = $this->userRepository->search($request);            
            if (view()->exists('Authetication::user.home')) {
                return view('Authetication::user.home', [
                    'users' => $users,
                ]);
            }
        }
    }

}
