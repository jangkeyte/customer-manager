<?php

namespace Modules\Customer\src\Http\Controllers;

use Modules\Customer\src\Helpers\PaginationHelper;
use Modules\Customer\src\Http\Controllers\Controller;
use Modules\Customer\src\Repositories\Statistics\StatisticsRepositoryInterface;
use Modules\Customer\src\Repositories\Customer\CustomerRepositoryInterface;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    /**
     * @var CustomerRepositoryInterface
     */
    private $customerRepository;
    protected $statisticsRepository;

    /**
     * CustomerController constructor.
     * 
     * @param CustomerRepositoryInterface $customerRepository
     */
    public function __construct(CustomerRepositoryInterface $customerRepository, StatisticsRepositoryInterface $statisticsRepository)
    {
        $this->customerRepository = $customerRepository;
        $this->statisticsRepository = $statisticsRepository;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $khach_hang = $this->customerRepository->getCustomerByID($id);
        return view('customer.partials.customer-update', [
            'khach_hang' => $khach_hang,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        $customers = $this->customerRepository->getCustomers();
        $statistics = $this->statisticsRepository->getStatisticsList();

        return view('Customer::dashboard', [
            'customers' => $customers,
            'thoi_gian' => $statistics['date'],
            'tinh_trang' => $statistics['status'],
            'nhan_vien' => $statistics['user'],
            'cua_hang' => $statistics['store'],
            'nguon_khach' => $statistics['source'],
            'kenh_lien_he' => $statistics['channel'],
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($ma_khach_hang)
    {
        $khach_hang = $this->customerRepository->getCustomerByID($ma_khach_hang);
        return view('Customer::customer.partials.customer-infomation', [
            'khach_hang' => $khach_hang,
        ]);
    }

}
