<?php

namespace Modules\Authetication\src\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Modules\JangKeyte\src\Traits\Filterable;
use Modules\Authetication\src\Traits\HasPermissionsTrait;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, SoftDeletes, Filterable, Notifiable, HasPermissionsTrait;

    protected $table = 'ktgiang_users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'uid',
        'username',
        'name',
        'email',
        'password',
        'image',
        'token',
    ];

    /**
     * Một tài khoản do 1 nhân viên sử dụng.
     */
    public function staff()
    {
    	return $this->hasOne('Modules\Customer\src\Models\Staff', 'ma_nhan_vien', 'uid');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
