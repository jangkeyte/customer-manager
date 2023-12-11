<?php

namespace App\Repositories\CareLog;

use App\Models\CareLog;
use App\Repositories\RepositoryInterface;
use Throwable;

/**
 * Interface CareLogRepositoryInterface
 *
 * @package App\Repositories\CareLog
 */
interface CareLogRepositoryInterface extends RepositoryInterface
{
    public function createNewCareLog($request);
}