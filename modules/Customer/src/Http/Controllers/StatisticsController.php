<?php

namespace Modules\Customer\src\Http\Controllers;

use Modules\Customer\src\Models\Customer;
use Modules\Customer\src\Http\Controllers\Controller;
use Modules\Customer\src\Repositories\Statistics\StatisticsRepositoryInterface;

use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class StatisticsController extends Controller
{
    /**
     * @var StatisticsRepositoryInterface
     */
    protected $statisticsRepository;

    /**
     * CustomerController constructor.
     * 
     * @param CustomerRepositoryInterface $customerRepository
     */
    public function __construct(StatisticsRepositoryInterface $statisticsRepository)
    {
        $this->statisticsRepository = $statisticsRepository;
    }

    /**
     * Display statistics dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function test()
    {        
        $statistics = $this->statisticsRepository->getStatisticsList();
        return view('Customer::statistics.dashboard', [
            'thoi_gian' => collect($statistics['date']),
            'tinh_trang' => collect($statistics['status']),
            'nhan_vien' => collect($statistics['user']),
            'cua_hang' => collect($statistics['store']),
            'nguon_khach' => collect($statistics['source']),
            'kenh_lien_he' => collect($statistics['channel'])
        ]);
    }

    /**
     * Display statistics dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $khachhang_theo_thang = new LaravelChart(
            array(
                'chart_title' => 'Tổng Khách hàng theo tháng',
                'report_type' => 'group_by_date',
                'model' => 'Modules\Customer\src\Models\Customer',
                'where_raw' => 'loai_khach = 1',
                'group_by_field' => 'ngay_nhap',
                'group_by_period' => 'month',
                'chart_type' => 'line',
                'chart_color ' => '0,255,255'
            )
        );

        $khachhang_theo_nhanvien = new LaravelChart(
            array(
                'chart_title' => 'Tổng Khách hàng',
                'chart_type' => 'pie',
                'report_type' => 'group_by_relationship',
                'model' => 'Modules\Customer\src\Models\Customer',
                'where_raw' => 'loai_khach = 1',

                'relationship_name' => 'staff', // represents function staff() on Customer model
                'group_by_field' => 'ten_nhan_vien', // ktgiang_staff.ten_nhan_vien
            )
        );

        $khachhang_theo_tinhtrang = new LaravelChart(
            array(
                'chart_title' => 'Tình trạng',
                'chart_type' => 'bar',
                'report_type' => 'group_by_relationship',
                'model' => 'Modules\Customer\src\Models\Customer',
                'where_raw' => 'loai_khach = 0',

                'relationship_name' => 'status', // represents function status() on Customer model
                'group_by_field' => 'name', // ktgiang_status.name
            )
        );

        $khachhang_theo_showroom = new LaravelChart(
            array(
                'chart_title' => 'Cửa hàng',
                'chart_type' => 'line',
                'report_type' => 'group_by_relationship',
                'model' => 'Modules\Customer\src\Models\Customer',
                'where_raw' => 'loai_khach = 0',
                'conditions' => [
                    ['name' => 'Sau mua', 'condition' => 'loai_khach = 1', 'color' => 'blue', 'fill' => true],
                    ['name' => 'Trước mua', 'condition' => 'loai_khach = 0', 'color' => 'red', 'fill' => true],
                ],

                'relationship_name' => 'store', // represents function store() on Customer model
                'group_by_field' => 'name', // ktgiang_store.name
            )
        );

        //dd(compact('chart1'));
        return view('Customer::statistics.dashboard', compact(['khachhang_theo_thang', 'khachhang_theo_nhanvien', 'khachhang_theo_tinhtrang', 'khachhang_theo_showroom']));
    }

}
