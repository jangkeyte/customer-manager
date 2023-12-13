<?php

namespace Modules\Customer\src\Repositories\Customer;

use Modules\Customer\src\Models\Customer;
use Modules\Customer\src\Filters\CustomerFilter;
use Modules\Customer\src\Repositories\BaseRepository;
use Illuminate\Database\DatabaseManager;
use Illuminate\Support\Facades\DB;

class CustomerRepository extends BaseRepository implements CustomerRepositoryInterface
{
    /**
     * @var Customer
     */
    protected $model;

    /**
     * CustomerRepository constructor.
     *
     * @param Customer $model
     */
    public function __construct(Customer $model)
    {
        parent::__construct($model);
    }

    // Lấy danh sách toàn bộ Khách hàng
    public function getCustomers()
    {
        return $this->model->paginate(30);
    }

    // Lấy thông tin Khách hàng theo Mã Khách hàng
    public function getCustomerByID($ma_khach_hang=0)
    {
        return $this->model->where('ma_khach_hang', $ma_khach_hang)->first();
    }

    // Lấy danh sách Khách hàng theo điều kiện đưa vào
    public function find($request)
    {
        return $this->model
            ->filter(new CustomerFilter($request))
            ->orderBy('updated_at', 'desc')
            ->paginate(99);    
    }

    // Cập nhật trạng thái Khách hàng theo Mã Khách hàng
    public function updateCustomerStatusByID($ma_khach_hang, $tinh_trang=0)
    {
        return Customer::where('ma_khach_hang', $ma_khach_hang)->update(['tinh_trang' => $tinh_trang]);
    }
    
    // Cập nhật thông tin Khách hàng theo Mã Khách hàng
    public function updateCustomerByID($ma_khach_hang, $khach_hang)
    {
        $ngay_lien_he_mua = $khach_hang->loai_khach ? 'ngay_mua' : 'ngay_lien_he';
        return Customer::where('ma_khach_hang', $ma_khach_hang)->update([
            'ten_khach_hang' => $khach_hang->ten_khach_hang,
            'gioi_tinh' => $khach_hang->gioi_tinh,
            'dia_chi' => $khach_hang->dia_chi,
            'so_dien_thoai' => $khach_hang->so_dien_thoai,
            'nguon_khach' => $khach_hang->nguon_khach,
            $ngay_lien_he_mua => $khach_hang->$ngay_lien_he_mua,
            'loai_xe' => $khach_hang->loai_xe,
            'mau_xe' => $khach_hang->mau_xe,
            'so_khung' => isset($khach_hang->so_khung) ? $khach_hang->so_khung : '',
            'so_may' => isset($khach_hang->so_may) ? $khach_hang->so_may : '',
            'nhan_vien' => $khach_hang->nhan_vien,
            'cua_hang' => $khach_hang->cua_hang,
            'ghi_chu' => $khach_hang->ghi_chu
        ]);
    }

/*

    // Cập nhật trạng thái Khách hàng theo Mã Khách hàng
    public function updateCustomerStatusByID($ma_khach_hang, $tinh_trang=0)
    {
        return Customer::where('ma_khach_hang', $ma_khach_hang)->update(['tinh_trang' => $tinh_trang]);
    }

    // Xóa Khách hàng theo Mã Khách hàng
    public function deleteCustomerByID($ma_khach_hang, $deleted=1)
    {
        return Customer::where('ma_khach_hang', $ma_khach_hang)->update(['deleted' => $deleted]);
    }

    // Lấy danh sách Khách hàng theo từ khóa tìm kiếm
    public function getCustomersByKeyword($loai_khach, $keyword)
    {
        return Customer::SauBan($loai_khach)->GetCustomerByRole()->TimNhanh($keyword)->get();
    }
*/
}