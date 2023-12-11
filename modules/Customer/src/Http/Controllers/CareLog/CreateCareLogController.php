<?php

namespace App\Http\Controllers\CareLog;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\CareLog;
use App\Models\Client;
use App\Providers\RouteServiceProvider;
use App\Repositories\Customer\CustomerRepositoryInterface;
use App\Repositories\CareLog\CareLogRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class CreateCareLogController extends Controller
{
    protected $customerRepository;
    protected $carelogRepository;
    
    public function __construct(CustomerRepositoryInterface $customerRepository, CareLogRepositoryInterface $carelogRepository)
    {
        $this->customerRepository = $customerRepository;
        $this->carelogRepository = $carelogRepository;
    }

    /**
     * Display the carelog create view.
     *
     * @return \Illuminate\View\View
     */
    public function create($khach_hang)
    {
        // Lấy thông tin Khách hàng theo mã Khách hàng truyền vào và gọi view hiển thị dữ liệu
        $customer = $this->customerRepository->getCustomerByID($khach_hang);
        $isCustomer = 1;
        if(empty($customer)) {
            return view('content-none', ['khach_hang' => $khach_hang]);
        } else {
            return view('carelog.partials.carelog-create', ['khach_hang' => $customer]);
        }
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        // Kiểm tra thông tin nhập vào theo yêu cầu
        if(!empty($request->noi_dung))
        {
            $request->validate([
                'khach_hang' => ['required', 'string', 'max:20'],
                'noi_dung' => ['required', 'string', 'max:400'],
            ]);
            
            // Tiến hành insert bản ghi vào database
            $this->carelogRepository->createNewCareLog($request);
        }
        
        // Cập nhật trạng thái Khách hàng nếu có thay đổi
        $customer = $this->customerRepository->updateCustomerStatusByID($request->khach_hang, $request->tinh_trang);

        // Quay trở lại trang Khách hàng
        if($request->loai_khach_hang)
            return redirect(RouteServiceProvider::CUSTOMER);
        else
            return redirect(RouteServiceProvider::CLIENT);
    }
}
