<?php

namespace Modules\Customer\src\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $table = 'ktgiang_store';
    //
    protected $fillable = ['id', 'uid', 'name', 'address', 'phone'];

    public function users()
    {
        return $this->hasMany('Modules\Customer\src\Models\User', 'showroom', 'uid');
    }

    public function customers()
    {
        return $this->hasMany('Modules\Customer\src\Models\Customer', 'cua_hang', 'uid');
    }

}
