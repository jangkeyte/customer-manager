<?php

namespace Modules\Customer\src\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CareLog extends Model
{
    use HasFactory;

    protected $table = 'ktgiang_carelog';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'khach_hang',
        'nhan_vien',   
        'noi_dung',   
        'loai_cham_soc',
        'tinh_trang',
        'ngay_thuc_hien',
    ];

    public $timestamp = true;
    
    /**
     * Một nhật ký chăm sóc thuộc một Khách hàng.
     */
    public function customer()
    {
        // return $this->belongsto('App\Models\Customer', 'foreign_key', 'local_key');
    	return $this->belongsto('App\Models\Customer', 'ma_khach_hang', 'khach_hang');
    }
    
    /**
     * Một nhật ký chăm sóc thuộc một nhân viên thực hiện.
     */
    public function user()
    {
        // return $this->belongsto('App\Models\Staff', 'foreign_key', 'local_key');
    	return $this->belongsto('App\Models\User', 'ma_nhan_vien', 'nhan_vien');
    }

    /**
     * Một nhật ký chăm sóc thuộc một trạng thái.
     */
    public function status()
    {
        // return $this->hasOne('App\Models\Status', 'foreign_key', 'local_key');
    	return $this->belongsto('App\Models\Status', 'tinh_trang', 'status');
    }
    
}
