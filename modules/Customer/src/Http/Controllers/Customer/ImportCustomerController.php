<?php

namespace Modules\Customer\src\Http\Controllers\Customer;

use Modules\Customer\src\Imports\CustomersImport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportCustomerController extends Controller
{
    public function create(){
        return view('Customer::customer.customer-import');
    }
    
    /*
    public function importUser(Request $request) 
    {
        //$root_folder = 'uploads/data/';
        //$fileName = $this->upload_file($request, 'user', $root_folder);
   
        //Excel::import(new UsersImport, $root_folder.$fileName);
        
        return view('import/import-dashboard')->with('success', 'Nhập người dùng thành công!');
    }
    */

    public function store(Request $request) 
    {
        $root_folder = 'uploads/data/';
        $fileName = $this->upload_file($request, 'customer', $root_folder);
        Excel::import(new CustomersImport, $root_folder.$fileName);
        //Excel::import(new CustomersImport, 'uploads/data/customers.xlsx');
        
        return view('import/import-dashboard')->with('success', 'Nhập Khách hàng thành công!');
    }

    /*
    public function importCareLog(Request $request) 
    {
        //$root_folder = 'uploads/data/';
        //$fileName = $this->upload_file($request, 'carelog', $root_folder);
   
        //Excel::import(new CareLogsImport, 'data/carelogs.xlsx');
        //Excel::import(new CareLogsImport, $root_folder.$fileName);

        return view('import/import-dashboard')->with('success', 'Nhập chăm sóc Khách thành công!');
    }
    */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function upload_file(Request $request, $type, $root_folder)
    {
        /*
        $request->validate([
            'file' => 'required|mimes:pdf,xlsx,xlx,csv|max:204800',
        ]);
        */

        $fileName = date("YmdHis",time()).'_'.$type.'.'.$request->file->extension();  
     
        $request->file->move(public_path($root_folder), $fileName);
   
        /*  
            Write Code Here for
            Store $fileName name in DATABASE from HERE 
        */
     
        return $fileName;
   
    }
}
