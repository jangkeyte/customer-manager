<?php

namespace Modules\Customer\src\Models;

use Modules\Customer\src\Scopes\CustomerExistScope;
use Modules\Customer\src\Scopes\CustomerTypeScope;
use Modules\Customer\src\Scopes\CustomerByRoleScope;
use Modules\JangKeyte\src\Traits\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class Customer extends Model
{
    use HasFactory, SoftDeletes, Filterable;

    protected $table = 'ktgiang_customer';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'ma_khach_hang',
        'ten_khach_hang',
        'gioi_tinh',
        'dia_chi',
        'so_dien_thoai', 
        'cach_lay_so',
        'nguon_khach',
        'kenh_lien_he',
        'loai_khach',
        'ngay_nhap', 
        'thoi_gian_nhan',
        'thoi_gian_chuyen',
        'nguoi_chuyen',
        'loai_xe',
        'mau_xe',   
        'so_khung',    
        'so_may',   
        'nhan_vien',   
        'cua_hang', 
        'nhu_cau',
        'thong_tin_lien_he',
        'tinh_trang',
        'ghi_chu',
    ];

    public $timestamps = true;

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope(new CustomerTypeScope());
        static::addGlobalScope(new CustomerByRoleScope());
    }

    /**
     * Một Khách hàng thuộc về một nhân viên chăm sóc.
     */
    public function staff()
    {
        // return $this->belongsto('App\Models\Staff', 'foreign_key', 'local_key');
    	return $this->belongsto('Modules\Customer\src\Models\Staff', 'nhan_vien', 'ma_nhan_vien');
    }

    /**
     * Một Khách hàng thuộc một trạng thái nhất định.
     */
    public function status()
    {
        // return $this->belongsto('App\Models\Staff', 'foreign_key', 'local_key');
    	return $this->belongsto('Modules\Customer\src\Models\Status', 'tinh_trang', 'status');
    }

    /**
     * Một Khách hàng thuộc một trạng thái nhất định.
     */
    public function product()
    {
        // return $this->belongsto('App\Models\Staff', 'foreign_key', 'local_key');
    	return $this->belongsto('Modules\Customer\src\Models\Product', 'loai_xe', 'uid');
    }

    /**
     * Một Khách hàng thuộc một nguồn cung cấp.
     */
    public function source()
    {
        // return $this->belongsto('App\Models\Staff', 'foreign_key', 'local_key');
    	return $this->belongsto('Modules\Customer\src\Models\Source', 'nguon_khach', 'source');
    }

    /**
     * Một Khách hàng thuộc một kênh liên hệ.
     */
    public function channel()
    {
        // return $this->belongsto('App\Models\Staff', 'foreign_key', 'local_key');
    	return $this->belongsto('Modules\Customer\src\Models\Channel', 'kenh_lien_he', 'channel');
    }

    /**
     * Một Khách hàng thuộc một nguồn cung cấp.
     */
    public function province()
    {
        // return $this->belongsto('App\Models\Staff', 'foreign_key', 'local_key');
    	return $this->belongsto('Modules\Customer\src\Models\Province', 'dia_chi', 'id');
    }

    /**
     * Một Khách hàng thuộc một cửa hàng.
     */
    public function store()
    {
        // return $this->belongsto('App\Models\Staff', 'foreign_key', 'local_key');
    	return $this->belongsto('Modules\Customer\src\Models\Store', 'cua_hang', 'uid');
    }

    /**
     * Một khách hàng có nhiều nhật ký chăm sóc.
     */
    public function carelogs()
    {
        // return $this->hasMany('App\Models\CareLog', 'foreign_key', 'local_key');
    	return $this->hasMany('Modules\Customer\src\Models\CareLog', 'khach_hang', 'ma_khach_hang');
    }
   
    /**
     * Scope a query to only include active users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeTrongThang($query, $date=0)
    {   
        $ngay_them = Route::currentRouteName() == 'timkhachhang' ? 'ngay_mua' : 'ngay_lien_he';
        if( $date != 0 ) {
            return $query->whereYear($ngay_them, idate("Y", strtotime($date)))->whereMonth( $ngay_them, idate("m", strtotime($date)));
        } else {
            return $query;
        }
    }

    /**
     * Scope a query to only include active users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeTimTuKhoa($query, $keyword)
    {   
        return $query->where('ten_khach_hang', 'like', '%' . $keyword . '%')
                    ->orWhere('so_dien_thoai', 'like', '%' . $keyword . '%')
                    ->orWhere('ma_khach_hang', 'like', '%' . $keyword . '%');
    }

}
