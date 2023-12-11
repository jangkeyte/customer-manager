<?php

namespace Modules\Authetication\src\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Modules\Authetication\src\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ImportUserController extends Controller
{
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

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
     * Display the dashboard view.
     */
    public function create(): View
    {
        if (view()->exists('Authetication::user.import')) {
            return view('Authetication::user.import');
        }
    }

    public function store(Request $request) 
    {
        $import = $this->userRepository->import($request);
        $message = $import > 0 ? 'Nhập ' .$import . ' dữ liệu người dùng thành công!!!' : 'Nhập dữ liệu thất bại.';
        return redirect()->back()->with('message', $message);
    }
}
