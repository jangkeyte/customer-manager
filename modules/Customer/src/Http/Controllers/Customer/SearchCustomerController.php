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

    /*
    public function search(Request $request)
    {   
        $customers = $this->customerRepository->getCustomersByKeyword(0, $request->value);
        return response()->json($customers);
    }
    */
    
    public function store(Request $request)
    {   
        $customers = $this->customerRepository->find($request);
        $statistics = $this->statisticsRepository->getStatisticsList();

        return view('Customer::customer.customer-list', [
            'customers' => $customers,
            'thoi_gian' => collect($statistics['date']),
            'tinh_trang' => collect($statistics['status']),
            'nhan_vien' => collect($statistics['user']),
            'cua_hang' => collect($statistics['store']),
            'nguon_khach' => collect($statistics['source']),
            'kenh_lien_he' => collect($statistics['channel']),
            'sap_xep' => collect(array('cua_hang' => 'Cửa hàng', 'nhan_vien' => 'Nhân viên', 'nguon_khach' => 'Nguồn khách', 'tinh_trang' => 'Tình trạng', 'thoi_gian' => 'Thời gian')),
            'sap_xep_theo' => collect(array('asc' => 'Tăng dần', 'desc' => 'Giảm dần'))
        ]);
    }
}
