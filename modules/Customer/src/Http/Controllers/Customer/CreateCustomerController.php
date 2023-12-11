<?php

namespace Modules\Customer\src\Http\Controllers\Customer;

use Modules\Customer\src\Models\Customer;
use Modules\Customer\src\Repositories\Customer\CustomerRepositoryInterface;
use Modules\Customer\src\Repositories\Statistics\StatisticsRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

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
        return view('customer.partials.customer-create', [
            'loai_xe' => $statistics['product'], 
            'nguon_khach' => $statistics['source'],
            'kenh_lien_he' => $statistics['channel'],
            'cua_hang' => $statistics['store'],
            'tinh_thanh' => $statistics['province'],
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
        if(Auth::user()->isAdmin()) {
            // Nếu là Khách hàng sau mua
            $request->validate([
                'ma_khach_hang' => ['required', 'string', 'max:20'],
                'ten_khach_hang' => ['required', 'string', 'max:80'],
                'so_dien_thoai' => ['required', 'string', 'max:11'],
                'loai_xe' => ['required', 'string', 'max:20'],
                'so_khung' => ['required', 'string', 'max:30'],
                'so_may' => ['required', 'string', 'max:30'],
            ]);
            $data = array(
                'ma_khach_hang' => $request->ma_khach_hang,
                'ten_khach_hang' => $request->ten_khach_hang,
                'gioi_tinh' => $request->gioi_tinh,
                'dia_chi' => empty($request->dia_chi) ? 0 : $request->dia_chi,
                'nguon_khach' => $request->nguon_khach,
                'loai_khach' => 1, // Sau bán
                'ngay_mua' => $request->ngay_mua,
                'loai_xe' => $request->loai_xe,
                'mau_xe' => empty($request->mau_xe) ? "Chưa có" : $request->mau_xe,
                'so_khung' => $request->so_khung,
                'so_may' => $request->so_may,
                'so_dien_thoai' => str_replace(' ', '', $request->so_dien_thoai),
                'nhan_vien' => $request->nhan_vien,
                'cua_hang' => $request->cua_hang,
                'tinh_trang' => 6, // Đã mua
                'ghi_chu' => json_encode(array('list_customer', 'edit_customer', 'delete_customer')),
            );
        } else {
            // Nếu là Khách hàng trước mua
            $request->validate([
                'ten_khach_hang' => ['required', 'string', 'max:80'],
                'so_dien_thoai' => ['required', 'string', 'max:11'],
            ]);
            $data = array(
                'ma_khach_hang' => Str::random(14),
                'ten_khach_hang' => $request->ten_khach_hang,
                'gioi_tinh' => $request->gioi_tinh,
                'dia_chi' => $request->dia_chi,
                'so_dien_thoai' => str_replace(' ', '', $request->so_dien_thoai),
                'nguon_khach' => $request->nguon_khach,
                'loai_khach' => 0, // Trước bán
                'ngay_lien_he' => $request->ngay_lien_he,
                'loai_xe' => $request->loai_xe,
                'nhan_vien' => Auth::user()->ma_nhan_vien,
                'cua_hang' => Auth::user()->showroom,
                'tinh_trang' => 1, // Chưa gọi
            );
        }
        
        $customer = Customer::create($data);
        
        if(Auth::user()->isAdmin()) {
            return redirect(RouteServiceProvider::CUSTOMER);
        } else {
            return redirect(RouteServiceProvider::CLIENT);
        }        
    }
}
