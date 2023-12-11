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
        'nguon_khach',
        'kenh_lien_he',
        'loai_khach',
        'ngay_nhap', 
        'loai_xe',
        'mau_xe',   
        'so_khung',    
        'so_may',   
        'nhan_vien',   
        'cua_hang', 
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
    public function user()
    {
        // return $this->belongsto('App\Models\Staff', 'foreign_key', 'local_key');
    	return $this->belongsto('App\Models\User', 'nhan_vien', 'ma_nhan_vien');
    }

    /**
     * Một Khách hàng thuộc một trạng thái nhất định.
     */
    public function status()
    {
        // return $this->belongsto('App\Models\Staff', 'foreign_key', 'local_key');
    	return $this->belongsto('App\Models\Status', 'tinh_trang', 'status');
    }

    /**
     * Một Khách hàng thuộc một trạng thái nhất định.
     */
    public function product()
    {
        // return $this->belongsto('App\Models\Staff', 'foreign_key', 'local_key');
    	return $this->belongsto('App\Models\Product', 'loai_xe', 'uid');
    }

    /**
     * Một Khách hàng thuộc một nguồn cung cấp.
     */
    public function source()
    {
        // return $this->belongsto('App\Models\Staff', 'foreign_key', 'local_key');
    	return $this->belongsto('App\Models\Source', 'nguon_khach', 'source');
    }

    /**
     * Một Khách hàng thuộc một kênh liên hệ.
     */
    public function channel()
    {
        // return $this->belongsto('App\Models\Staff', 'foreign_key', 'local_key');
    	return $this->belongsto('App\Models\Channel', 'kenh_lien_he', 'channel');
    }

    /**
     * Một Khách hàng thuộc một nguồn cung cấp.
     */
    public function province()
    {
        // return $this->belongsto('App\Models\Staff', 'foreign_key', 'local_key');
    	return $this->belongsto('App\Models\Province', 'dia_chi', 'id');
    }

    /**
     * Một Khách hàng thuộc một cửa hàng.
     */
    public function store()
    {
        // return $this->belongsto('App\Models\Staff', 'foreign_key', 'local_key');
    	return $this->belongsto('App\Models\Store', 'cua_hang', 'uid');
    }

    /**
     * Một khách hàng có nhiều nhật ký chăm sóc.
     */
    public function carelogs()
    {
        // return $this->hasMany('App\Models\CareLog', 'foreign_key', 'local_key');
    	return $this->hasMany('App\Models\CareLog', 'khach_hang', 'ma_khach_hang');
    }
   
    /**
     * Scope a query to only include active users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeTinhTrang($query, $tinh_trang=0)
    {
        if( $tinh_trang != 0 ) {
            return $query->where( 'tinh_trang', $tinh_trang );
        } else {
            return $query->where( 'tinh_trang', '<>', $tinh_trang );
        }
    }

    /**
     * Scope a query to only include active users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeKhachShowroom($query, $cua_hang=0)
    {
        if( $cua_hang != 0 ) {
            return $query->where( 'cua_hang', $cua_hang );
        } else {
            return $query->where( 'cua_hang', '<>', $cua_hang );
        }
    }

    /**
     * Scope a query to only include active users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeKhachNhanVien($query, $nhan_vien=0)
    {
        if( $nhan_vien != 0 ) {
            return $query->where( 'nhan_vien', $nhan_vien );
        } else {
            return $query->where( 'nhan_vien', '<>', $nhan_vien );
        }
    }

    /**
     * Scope a query to only include active users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeNguonKhach($query, $nguon_khach=0)
    {
        if( $nguon_khach != 0 ) {
            return $query->where( 'nguon_khach', $nguon_khach );
        } else {
            return $query->where( 'nguon_khach', '<>', $nguon_khach );
        }
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
    public function scopeSapXepMacDinh($query)
    {   
        $thoi_gian = Route::currentRouteName() == 'customer-dashboard' ? 'ngay_mua' : 'ngay_lien_he';
        return $query->orderBy($thoi_gian, 'desc');
    }

    /**
     * Scope a query to only include active users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeTuNgay($query, $date=0)
    {   
        $ngay_them = Route::currentRouteName() == 'timkhachhang' ? 'ngay_mua' : 'ngay_lien_he';
        $date .= Route::currentRouteName() == 'timkhachhang' ? '' : ' 00:00:00';
        if( $date != 0 ) {
            return $query->whereDate($ngay_them, '>=', $date);
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
    public function scopeDenNgay($query, $date=0)
    {   
        $ngay_them = Route::currentRouteName() == 'timkhachhang' ? 'ngay_mua' : 'ngay_lien_he';
        $date .= Route::currentRouteName() == 'timkhachhang' ? '' : ' 00:00:00';
        if( $date != 0 ) {
            return $query->whereDate($ngay_them, '<=', $date);
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
    public function scopeSapXepTheo($query, $thuoc_tinh='', $sap_xep_theo='desc')
    {   
        //dd($thuoc_tinh, $sap_xep_theo);
        $thoi_gian = Route::currentRouteName() == 'timkhachhang' ? 'ngay_mua' : 'ngay_lien_he';
        if( $thuoc_tinh != 'thoi_gian' ) {
            return $query->orderBy($thuoc_tinh, $sap_xep_theo);
        } else {
            return $query->orderBy($thoi_gian, $sap_xep_theo);
        }
    }

    /**
     * Scope a query to only include active users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeNhanVien($query, $ma_nhan_vien='')
    {
        if( !empty($ma_nhan_vien) ) {
            return $query->where( 'nhan_vien', $ma_nhan_vien );           
        } elseif ($ma_nhan_vien == 0) {
            return $query->where( 'nhan_vien', '<>', $ma_nhan_vien );
        } else {
            return $query->where( 'nhan_vien', Auth::user()->ma_nhan_vien ); 
        }
    }

    /**
     * Scope a query to only include active users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeShowroom($query)
    {
        return $query->where( 'cua_hang', Auth::user()->showroom );
    }

    /**
     * Scope a query to only include active users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeGetCustomerByRole($query)
    {
        if(Auth::user()->haveRights('list_customer_area') || Auth::user()->haveRights('find_customer_area')){
            return $query;
        } elseif(Auth::user()->haveRights('list_customer_local') || Auth::user()->haveRights('find_customer_local')) {
            return $query->where( 'cua_hang', Auth::user()->showroom );
        } else {
            return $query->where( 'nhan_vien', Auth::user()->ma_nhan_vien );
        }
    }

    /**
     * Scope a query to only include active users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeTimNhanh($query, $keyword)
    {   
        return $query->where('ten_khach_hang', 'like', '%' . $keyword . '%')
                    ->orWhere('so_dien_thoai', 'like', '%' . $keyword . '%')
                    ->orWhere('so_khung', 'like', '%' . $keyword . '%')
                    ->orWhere('so_may', 'like', '%' . $keyword . '%')
                    ->orWhere('loai_xe', 'like', '%' . $keyword . '%')
                    ->orWhere('ma_khach_hang', 'like', '%' . $keyword . '%');
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
