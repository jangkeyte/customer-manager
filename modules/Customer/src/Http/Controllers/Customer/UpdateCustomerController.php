<?php

namespace Modules\Customer\src\Http\Controllers\Customer;

use Modules\Customer\src\Models\Customer;
use Modules\Customer\src\Models\User;
use Modules\Customer\src\Models\Province;
use Modules\Customer\src\Repositories\Customer\CustomerRepositoryInterface;
use Modules\Customer\src\Repositories\Statistics\StatisticsRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class UpdateCustomerController extends Controller
{
    private $customerRepository;
    private $statisticsRepository;
    
    public function __construct(CustomerRepositoryInterface $customerRepository, StatisticsRepositoryInterface $statisticsRepository)
    {
        $this->customerRepository = $customerRepository;
        $this->statisticsRepository = $statisticsRepository;
    }

    /**
     * Display the customer create view.
     *
     * @return \Illuminate\View\View
     */
    public function create($ma_khach_hang)
    {        
        $khach_hang = $this->customerRepository->getCustomerByID($ma_khach_hang);
        $statistics = $this->statisticsRepository->getPureStatisticsList();

        return view('customer.partials.customer-update', [
            'customer' => $khach_hang,
            'tinh_thanh' => $statistics['province'],
            'loai_xe' => $statistics['product'], 
            'nguon_khach' => $statistics['source'],
            'cua_hang' => $statistics['store'],
            'danh_sach_nhan_vien' => $statistics['user']
        ]);
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
        $customer = $this->customerRepository->updateCustomerByID($request->ma_khach_hang, $request);        
        return redirect(RouteServiceProvider::CUSTOMER);
    }
    
}
