<?php

namespace Modules\Customer\src\Repositories\Customer;

use Modules\Customer\src\Models\Customer;
use Modules\Customer\src\Filters\CustomerFilter;
use Modules\Customer\src\Imports\CustomersImport;
use Modules\Customer\src\Repositories\BaseRepository;
use Illuminate\Database\DatabaseManager;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CustomerRepository extends BaseRepository implements CustomerRepositoryInterface
{
    /**
     * @var Customer
     */
    protected $model;

    protected $isCustomer;

    /**
     * CustomerRepository constructor.
     *
     * @param Customer $model
     */
    public function __construct(Customer $model)
    {
        parent::__construct($model);
        $this->isCustomer = ( Route::current()->getPrefix() == '/customer' );
    }

    // Lấy danh sách toàn bộ Khách hàng
    public function getCustomers()
    {
        return $this->model
            ->orderBy('ngay_nhap', 'desc')
            ->paginate(20);
    }

    // Lấy thông tin Khách hàng theo Mã Khách hàng
    public function getCustomerByID($ma_khach_hang=0)
    {
        return $this->model->where('ma_khach_hang', $ma_khach_hang)->first();
    }

    // Lấy danh sách Khách hàng theo điều kiện đưa vào
    public function find($request)
    {         
        //dd($request->all());
        $result = $this->model
            ->filter(new CustomerFilter($request))
            ->orderBy($request->sap_xep ?? 'ngay_nhap', $request->sap_xep_theo ?? 'asc')
            ->paginate(100);            
        //dd($result);
        return $result; 
    }

    // Cập nhật thông tin Khách hàng theo Mã Khách hàng
    public function createCustomer($request)
    {
        return $customer = Customer::create(
            array(
                'ma_khach_hang' => $request->ma_khach_hang ?? uniqid(),
                'ten_khach_hang' => $request->ten_khach_hang,
                'so_dien_thoai' => str_replace(' ', '', $request->so_dien_thoai),
                'gioi_tinh' => $request->gioi_tinh ?? config('customer.default.gioi_tinh'),
                'thong_tin_lien_he' => $request->thong_tin_lien_he ?? config('customer.default.thong_tin_lien_he'),
                'dia_chi' => $request->dia_chi ??  config('customer.default.dia_chi'),
                'nguon_khach' => $request->nguon_khach ?? config('customer.default.nguon_khach'),
                'kenh_lien_he' => $request->kenh_lien_he ?? config('customer.default.kenh_lien_he'),
                'cach_lay_so' => $request->cach_lay_so ?? config('customer.default.cach_lay_so'),
                'loai_xe' => $request->loai_xe ?? config('customer.default.loai_xe'),
                'thoi_gian_nhan' => $request->thoi_gian_nhan ?? date('Y-m-d H:i:s'),
                'thoi_gian_chuyen' => $request->thoi_gian_chuyen ?? date('Y-m-d H:i:s'),
                'nguoi_chuyen' => $request->nguoi_chuyen ?? (config('customer.default.nguoi_chuyen') ?? auth()->user()->staff->ma_nhan_vien),
                'nhu_cau' => $request->nhu_cau ?? config('customer.default.nhu_cau'),
                'so_khung' => $request->so_khung ?? NULL,
                'so_may' => $request->so_may ?? NULL,
                'mau_xe' => $request->mau_xe ?? NULL,
                'nhan_vien' => $request->nhan_vien ?? (config('customer.default.nhan_vien') ?? auth()->user()->staff->ma_nhan_vien),
                'cua_hang' => $request->cua_hang ?? (config('customer.default.cua_hang') ?? auth()->user()->staff->cua_hang),
                'tinh_trang' => $this->isCustomer ? 6 : 1,
                'loai_khach' => $this->isCustomer ? 1 : 0,
                'ngay_nhap' => $request->thoi_gian_nhan ?? date('Y-m-d H:i:s'), 
                'ghi_chu' => $request->ghi_chu ?? config('customer.default.ghi_chu'),
            )
        );
    }

    // Cập nhật trạng thái Khách hàng theo Mã Khách hàng
    public function updateCustomerStatusByID($ma_khach_hang, $tinh_trang=0)
    {
        return Customer::where('ma_khach_hang', $ma_khach_hang)->update(['tinh_trang' => $tinh_trang]);
    }
    
    // Cập nhật thông tin Khách hàng theo Mã Khách hàng
    public function updateCustomerByID($ma_khach_hang, $request)
    {
        return Customer::where('ma_khach_hang', $ma_khach_hang)->update([
            'ten_khach_hang' => $request->ten_khach_hang,
            'so_dien_thoai' => str_replace(' ', '', $request->so_dien_thoai),
            'gioi_tinh' => $request->gioi_tinh,
            'thong_tin_lien_he' => $request->thong_tin_lien_he,
            'dia_chi' => $request->dia_chi ?? 0,
            'nguon_khach' => $request->nguon_khach,
            'kenh_lien_he' => $request->kenh_lien_he,
            'cach_lay_so' => $request->cach_lay_so,
            'loai_xe' => $request->loai_xe,
            'thoi_gian_nhan' => $request->thoi_gian_nhan,
            'thoi_gian_chuyen' => $request->thoi_gian_chuyen,
            'nguoi_chuyen' => $request->nguoi_chuyen,
            'nhu_cau' => $request->nhu_cau,
            'so_khung' => $request->so_khung ?? NULL,
            'so_may' => $request->so_may ?? NULL,
            'mau_xe' => $request->mau_xe ?? NULL,
            'nhan_vien' => $request->nhan_vien,
            'cua_hang' => $request->cua_hang,
            'tinh_trang' => $request->tinh_trang ?? ($this->isCustomer ? 6 : 1),
            'loai_khach' => $request->loai_khach ?? ($this->isCustomer ? 1 : 0),
            'ghi_chu' => $request->ghi_chu,
        ]);
    }

    // Xóa Khách hàng theo Mã Khách hàng
    public function deleteCustomerByID($ma_khach_hang)
    {
        return Customer::where('ma_khach_hang', $ma_khach_hang)->delete();
    }

    /**
     * Import customers from file upload
     *
     * @param request
     * @return bool
     */
    public function import(Request $request)
    {
        try {
            $root_folder = 'uploads/data/';
            $fileName = $this->upload_file($request, 'customer', $root_folder);
            $import = new CustomersImport;
            Excel::import(new $import, $root_folder . $fileName);
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
             $failures = $e->failures();
             
             foreach ($failures as $failure) {
                 $failure->row(); // row that went wrong
                 $failure->attribute(); // either heading key (if using heading row concern) or column index
                 $failure->errors(); // Actual error messages from Laravel validator
                 $failure->values(); // The values of the row that has failed.
             }
             return $failure;
        }
        return $import->getRowCount();
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function upload_file(Request $request, $type, $root_folder)
    {
        
        $request->validate([
            'file' => 'required|mimes:pdf,xlsx,xlx,csv|max:204800',
        ]);
        $fileName = date("YmdHis",time()).'_'.$type.'.'.$request->file->extension();       
        $request->file->move(public_path($root_folder), $fileName);   
        return $fileName;
   
    }
    
    /**
     * Tự động đặt lại encoding excel import theo encoding kiểm tra được của dữ liệu.
     *
     * @return \Illuminate\Http\Response
     */
    function setInputEncoding($file) {
        $fileContent = file_get_contents($file->path());
        $enc = mb_detect_encoding($fileContent, mb_list_encodings(), true);
        
        \Config::set('excel.imports.csv.input_encoding', $enc);
    }

    /*
    // Cập nhật trạng thái Khách hàng theo Mã Khách hàng
    public function updateCustomerStatusByID($ma_khach_hang, $tinh_trang=0)
    {
        return Customer::where('ma_khach_hang', $ma_khach_hang)->update(['tinh_trang' => $tinh_trang]);
    }

    // Lấy danh sách Khách hàng theo từ khóa tìm kiếm
    public function getCustomersByKeyword($loai_khach, $keyword)
    {
        return Customer::SauBan($loai_khach)->GetCustomerByRole()->TimNhanh($keyword)->get();
    }
    */
}