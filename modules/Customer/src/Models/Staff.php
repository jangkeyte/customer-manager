<?php

namespace Modules\Customer\src\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Database\Eloquent\SoftDeletes;

class Staff extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'ktgiang_staff';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'ma_nhan_vien',
        'ten_nhan_vien',
        'gioi_tinh',
        'hinh_anh',
        'so_dien_thoai',
        'cua_hang',
        'bo_phan',
        'chuc_vu',
        'ghi_chu',
    ];

    /**
     * Một nhân viên thuộc về 1 tài khoản.
     */
    public function user()
    {
    	return $this->belongTo('Modules\Authetication\src\Models\User', 'uid', 'ma_nhan_vien');
    }

    /**
     * Một nhân viên có nhiều Khách hàng.
     */
    public function customers()
    {
    	return $this->hasMany('Modules\Customer\src\Models\Customer', 'nhan_vien', 'ma_nhan_vien');
    }

    /**
     * Một nhân viên có nhiều nhật ký chăm sóc.
     */
    public function carelogs()
    {
    	return $this->hasMany('Modules\Customer\src\Models\CareLog', 'nhan_vien', 'ma_nhan_vien');
    }
}
