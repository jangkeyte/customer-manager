<?php

namespace Modules\Customer\src\Repositories\Statistics;

use Modules\Customer\src\Models\Statistics;
use Modules\Customer\src\Models\Customer;
use Modules\Authetication\src\Models\User;
use Modules\Customer\src\Models\Staff;
use Modules\Customer\src\Models\Product;
use Modules\Customer\src\Models\Source;
use Modules\Customer\src\Models\Channel;
use Modules\Customer\src\Models\Store;
use Modules\Customer\src\Models\Province;
use Modules\Customer\src\Models\Status;

use Modules\Customer\src\Repositories\BaseRepository;
use Illuminate\Database\DatabaseManager;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class StatisticsRepository extends BaseRepository implements StatisticsRepositoryInterface
{
    /**
     * @var Statistics
     */
    protected $model;

    /**
     * StatisticsRepository constructor.
     *
     * @param Statistics $model
     */
    public function __construct(Statistics $model)
    {
        parent::__construct($model);
    }

    // Lấy danh sách toàn bộ Khách hàng
    public function getStatistics()
    {
        return Customer::all();
    }

    // Lấy thông tin trạng thái theo mã trạng thái
    public function getPureStatisticsList()
    {
        $statistics = array();
        $statistics['staff'] = Staff::pluck('ten_nhan_vien', 'ma_nhan_vien');
        $statistics['product'] = Product::pluck('name', 'uid');
        $statistics['source'] = Source::pluck('name', 'source');
        $statistics['channel'] = Channel::pluck('name', 'channel');
        $statistics['store'] = Store::pluck('name', 'uid');
        $statistics['province'] = Province::pluck('name', 'id');
        $statistics['status'] = Status::pluck('name', 'id');
        return $statistics;
    }

    // Lấy thông tin trạng thái theo mã trạng thái
    public function getStatisticsList()
    {
        $statistics = array();
        $statistics['status'] = $this->getStatusListWithCount();
        $statistics['store'] = $this->getStoreListWithCount();
        $statistics['user'] = $this->getUserListWithCount();
        $statistics['source'] = $this->getSourceListWithCount();
        $statistics['channel'] = $this->getChannelListWithCount();
        $statistics['date'] = $this->getDateListWithCount();
        /*
        $totals = DB::table('subscribers')
        ->selectRaw('count(*) as total')
        ->selectRaw("count(case when status = 'confirmed' then 1 end) as confirmed")
        ->selectRaw("count(case when status = 'unconfirmed' then 1 end) as unconfirmed")
        ->selectRaw("count(case when status = 'cancelled' then 1 end) as cancelled")
        ->selectRaw("count(case when status = 'rejected' then 1 end) as rejected")
        ->first();
        */
        return $statistics;
    }

    // Lấy danh sách Khách hàng theo kết quả tư vấn với số lượng Khách hàng
    public function getStatusListWithCount()
    {
        $countList = Customer::join('ktgiang_status', 'ktgiang_customer.tinh_trang', '=', 'ktgiang_status.status')
            ->select(DB::raw("COUNT(*) AS so_khach"), 'ktgiang_customer.tinh_trang', 'ktgiang_status.name')
            ->groupBy('ktgiang_customer.tinh_trang', 'ktgiang_status.name')
            ->get();

        return $this->getResultOfObject($countList, 'tinh_trang', 'name');
    }
    
    // Lấy danh sách cửa hàng với số lượng Khách hàng
    public function getStoreListWithCount()
    {
        $countList = Customer::join('ktgiang_store', 'ktgiang_customer.cua_hang', '=', 'ktgiang_store.uid')
            ->select(DB::raw("COUNT(*) AS so_khach, ktgiang_customer.cua_hang, ktgiang_store.name"))
            ->groupBy('ktgiang_customer.cua_hang', 'ktgiang_store.name')
            ->get();

        return $this->getResultOfObject($countList, 'cua_hang', 'name');
    }

    // Lấy danh sách nhân viên với số lượng Khách hàng
    public function getUserListWithCount()
    {
        $countList = Customer::join('ktgiang_staff', 'ktgiang_customer.nhan_vien', '=', 'ktgiang_staff.ma_nhan_vien')
            ->select(DB::raw("COUNT(*) AS so_khach, ktgiang_customer.nhan_vien, ktgiang_staff.ten_nhan_vien"))
            ->groupBy('ktgiang_customer.nhan_vien', 'ktgiang_staff.ten_nhan_vien')
            ->get();

        return $this->getResultOfObject($countList, 'nhan_vien', 'ten_nhan_vien');
    }
    
    // Lấy danh sách Nguồn khách với số lượng Khách hàng
    public function getSourceListWithCount()
    {
        $countList = Customer::join('ktgiang_source', 'ktgiang_customer.nguon_khach', '=', 'ktgiang_source.source')
            ->select(DB::raw("COUNT(*) AS so_khach, ktgiang_customer.nguon_khach, ktgiang_source.name"))
            ->groupBy('ktgiang_customer.nguon_khach', 'ktgiang_source.name')
            ->get();

        return $this->getResultOfObject($countList, 'nguon_khach', 'name');
    }
    
    // Lấy danh sách kênh liên hệ với số lượng Khách hàng
    public function getChannelListWithCount()
    {
        $countList = Customer::join('ktgiang_channel', 'ktgiang_customer.kenh_lien_he', '=', 'ktgiang_channel.channel')
            ->select(DB::raw("COUNT(*) AS so_khach, ktgiang_customer.kenh_lien_he, ktgiang_channel.name"))
            ->groupBy('ktgiang_customer.kenh_lien_he', 'ktgiang_channel.name')
            ->get();

        return $this->getResultOfObject($countList, 'kenh_lien_he', 'name');
    }
    
    // Lấy danh sách tháng năm với số lượng Khách hàng
    public function getDateListWithCount()
    {
        $countList = Customer::select(DB::raw("COUNT(*) AS so_khach, DATE_FORMAT(ngay_nhap,'%Y-%m') AS thoi_gian, DATE_FORMAT(ngay_nhap,'%m/%Y') AS name"))
            ->groupBy('thoi_gian', 'name')
            ->get();

        return $this->getResultOfObject($countList, 'thoi_gian', 'name', true);        
    }
    
    // Xử lý lấy kết quả trả về
    public function getResultOfObject($countByObject, $objectID, $objectName)
    {
        $result = array('' => 'Tất cả - [' . $countByObject->sum('so_khach') . ']');
        if(!empty($countByObject)){
            foreach($countByObject as $object)
            { 
                $result[$object->$objectID] = $object->$objectName . ' - [' . $object->so_khach . ']'; 
            }
        }
        return $result;
    }

}