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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $khach_hang = $this->customerRepository->getCustomerByID($id);
        return view('Customer::customer.partials.customer-detail', [
            'khach_hang' => $khach_hang,
        ]);
    }

}
