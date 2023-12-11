<?php

namespace App\Http\Controllers\Customer;

use App\Repositories\CustomerRepository;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

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
        return view('customer.partials.customer-delete', [
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
        return redirect(RouteServiceProvider::CUSTOMER);
    }
}
