<?php

namespace Modules\Customer\src\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $table = 'ktgiang_status';
    //
    protected $fillable = ['id', 'name', 'status', 'code'];

    /**
     * Một trạng thái có nhiều Khách hàng.
     */
    public function customers()
    {
        return $this->hasMany('Modules\Customer\src\Models\Customer');
    }

    /**
     * Một trạng thái có nhiều nhật ký chăm sóc.
     */
    public function carelogs()
    {
        return $this->hasMany('Modules\Customer\src\Models\CareLog');
    }

}
