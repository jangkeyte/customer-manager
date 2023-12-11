<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Imports\UsersImport;
use App\Imports\CustomersImport;
use App\Imports\CareLogsImport;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    public function index(){
        return view('import/import-dashboard');
    }
    
    public function importUser(Request $request) 
    {
        //$root_folder = 'uploads/data/';
        //$fileName = $this->upload_file($request, 'user', $root_folder);
   
        //Excel::import(new UsersImport, $root_folder.$fileName);
        
        return view('import/import-dashboard')->with('success', 'Nhập người dùng thành công!');
    }

    public function importCustomer(Request $request) 
    {
        $root_folder = 'uploads/data/';
        $fileName = $this->upload_file($request, 'customer', $root_folder);
   
        Excel::import(new CustomersImport, $root_folder.$fileName);
        //Excel::import(new CustomersImport, 'uploads/data/customers.xlsx');
        
        return view('import/import-dashboard')->with('success', 'Nhập Khách hàng thành công!');
    }

    public function importCareLog(Request $request) 
    {
        //$root_folder = 'uploads/data/';
        //$fileName = $this->upload_file($request, 'carelog', $root_folder);
   
        //Excel::import(new CareLogsImport, 'data/carelogs.xlsx');
        //Excel::import(new CareLogsImport, $root_folder.$fileName);

        return view('import/import-dashboard')->with('success', 'Nhập chăm sóc Khách thành công!');
    }

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
