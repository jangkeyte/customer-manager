<?php

namespace Modules\Customer\src\Http\Controllers\Customer;

use Modules\Customer\src\Imports\CustomersImport;
use Modules\Customer\src\Repositories\Customer\CustomerRepositoryInterface;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImportCustomerController extends Controller
{
    /**
     * @var CustomerRepositoryInterface
     */
    private $customerRepository;

    /**
     * CustomerController constructor.
     * 
     * @param CustomerRepositoryInterface $customerRepository
     */
    public function __construct(CustomerRepositoryInterface $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    /**
     * Display the import view.
     */
    public function create(){
        if (view()->exists('Customer::customer.customer-import')) {
            return view('Customer::customer.customer-import');
        }
    }
    
    public function store(Request $request) 
    {
        $result = $this->customerRepository->import($request);
        //dd($import->errors()[0]);
        return redirect()->back()->with('message', $result);
    }

}
