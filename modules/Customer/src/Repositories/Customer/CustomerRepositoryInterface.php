<?php

namespace Modules\Customer\src\Repositories\Customer;

use Modules\Customer\src\Models\Customer;
use Modules\Customer\src\Repositories\RepositoryInterface;
use Throwable;

/**
 * Interface CustomerRepositoryInterface
 *
 * @package Modules\Customer\src\Repositories\Customer
 */
interface CustomerRepositoryInterface extends RepositoryInterface
{
    public function getCustomers();
    public function getCustomerByID($ma_khach_hang);
    public function updateCustomerStatusByID($ma_khach_hang, $tinh_trang);
}