<?php

namespace Modules\Customer\src\Http\Controllers\Customer;

//use Modules\Customer\src\Models\Customer;
use Modules\Customer\src\Http\Requests\Customer\CreateCustomerRequest;
use Modules\Customer\src\Repositories\Customer\CustomerRepositoryInterface;
use Modules\Customer\src\Repositories\Statistics\StatisticsRepositoryInterface;
use App\Http\Controllers\Controller;
//use Illuminate\Support\Str;
//use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class CreateCustomerController extends Controller
{
    protected $customerRepository;
    protected $statisticsRepository;
    
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
    public function create()
    {
        $statistics = $this->statisticsRepository->getPureStatisticsList();
        return view('Customer::customer.customer-create', [
            'loai_xe' => $statistics['product'], 
            'nguon_khach' => $statistics['source'],
            'kenh_lien_he' => $statistics['channel'],
            'cua_hang' => $statistics['store'],
            'tinh_thanh' => $statistics['province'],
            'danh_sach_nhan_vien' => $statistics['staff'],
            'cach_lay_so' => collect(array('1' => 'Tự cho', '2' => 'Quét số', '0' => 'Không quét được')),
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
    public function store(CreateCustomerRequest $request)
    {
        //dd($request->all());
        $customer = $this->customerRepository->createCustomer($request); 
        return redirect()->route(getRouteName());
    }
}
