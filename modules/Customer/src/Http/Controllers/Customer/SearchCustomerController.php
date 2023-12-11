<?php

namespace Modules\Customer\src\Http\Controllers\Customer;

use Modules\Customer\src\Repositories\Customer\CustomerRepositoryInterface;
use Modules\Customer\src\Repositories\Statistics\StatisticsRepositoryInterface;
use Modules\Customer\src\Models\Customer;
use Modules\Customer\src\Models\User;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class SearchCustomerController extends Controller
{
    protected $customerRepository;
    protected $statisticsRepository;
    
    public function __construct(CustomerRepositoryInterface $customerRepository, StatisticsRepositoryInterface $statisticsRepository)
    {
        $this->customerRepository = $customerRepository;
        $this->statisticsRepository = $statisticsRepository;
    }

    public function search(Request $request)
    {   
        $customers = $this->customerRepository->getCustomersByKeyword(0, $request->value);
        return response()->json($customers);
    }

    public function find(Request $request)
    {   
        if(Route::currentRouteName() == 'timkhachhang') { $loai_khach = 1; } else { $loai_khach = 0; }
        
        $customers = $this->customerRepository->find($request);
        $statistics = $this->statisticsRepository->getStatisticsList($loai_khach);

        return view('customer.customer-dashboard', [
            'customers' => $customers,
            'thoi_gian' => $statistics['date'],
            'tinh_trang' => $statistics['status'],
            'nhan_vien' => $statistics['user'],
            'cua_hang' => $statistics['store'],
            'nguon_khach' => $statistics['source'],
        ]);
    }
}
