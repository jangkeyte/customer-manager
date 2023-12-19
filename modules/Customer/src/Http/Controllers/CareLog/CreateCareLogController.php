<?php

namespace Modules\Customer\src\Http\Controllers\CareLog;

use Modules\Customer\src\Models\Customer;
use Modules\Customer\src\Models\Status;
use Modules\Customer\src\Models\CareLog;
use Modules\Customer\src\Repositories\Customer\CustomerRepositoryInterface;
use Modules\Customer\src\Repositories\CareLog\CareLogRepositoryInterface;

use App\Providers\RouteServiceProvider;
use App\Http\Controllers\Controller;
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
    public function create($ma_khach_hang)
    {
        // Lấy thông tin Khách hàng theo mã Khách hàng truyền vào và gọi view hiển thị dữ liệu
        $customer = $this->customerRepository->getCustomerByID($ma_khach_hang);
        $status = Status::pluck('name', 'id');
        if(empty($customer)) {
            return view('Customer::content-none', ['customer' => $customer]);
        } else {
            return view('Customer::carelog.carelog-create', ['customer' => $customer, 'status' => $status]);
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
        return redirect()->back();
    }
}
