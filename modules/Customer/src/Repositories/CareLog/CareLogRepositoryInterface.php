<?php

namespace Modules\Customer\src\Repositories\CareLog;

use Modules\Customer\src\Models\CareLog;
use Modules\Customer\src\Repositories\RepositoryInterface;
use Throwable;

/**
 * Interface CareLogRepositoryInterface
 *
 * @package Modules\Customer\src\Repositories\CareLog
 */
interface CareLogRepositoryInterface extends RepositoryInterface
{
    public function createNewCareLog($request);
}