<?php

namespace Modules\Customer\src\Repositories\Statistics;

use Modules\Customer\src\Models\Statistics;
use Modules\Customer\src\Repositories\RepositoryInterface;
use Throwable;

/**
 * Interface StatisticsRepositoryInterface
 *
 * @package Modules\Customer\src\Repositories\Statistics
 */
interface StatisticsRepositoryInterface extends RepositoryInterface
{
    // Lấy danh sách toàn bộ Khách hàng
    public function getStatistics();

    // Lấy thông tin trạng thái theo mã trạng thái
    public function getPureStatisticsList();

    // Lấy thông tin trạng thái theo mã trạng thái
    public function getStatisticsList();

    // Lấy danh sách Khách hàng theo kết quả tư vấn với số lượng Khách hàng
    public function getStatusListWithCount();
    
    // Lấy danh sách cửa hàng với số lượng Khách hàng
    public function getStoreListWithCount();

    // Lấy danh sách nhân viên với số lượng Khách hàng
    public function getUserListWithCount();
    
    // Lấy danh sách Nguồn khách với số lượng Khách hàng
    public function getSourceListWithCount();

    // Lấy danh sách tháng năm với số lượng Khách hàng
    public function getDateListWithCount();

    // Xử lý lấy kết quả trả về
    public function getResultOfObject($countByObject, $objectID, $objectName);
}