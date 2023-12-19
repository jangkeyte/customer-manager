<?php

namespace Modules\Customer\src\Http\Controllers\Customer;

use Modules\Customer\src\Models\User;
use Modules\Customer\src\Models\Customer;
use Modules\Customer\src\Repositories\Customer\CustomerRepository;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class RemoveCustomerController extends Controller
{
    protected $customerRepository;
    
    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    /**
     * Display the customer create view.
     *
     * @return \Illuminate\View\View
     */
    public function create($ma_khach_hang)
    {
        $customer = Customer::where('ma_khach_hang', $ma_khach_hang)->first(); 
        return view('Customer::customer.customer-delete', [
            'customer' => $customer,
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
        $result = $this->customerRepository->deleteCustomerByID($request->ma_khach_hang);     
        return redirect()->back();
    }
}
