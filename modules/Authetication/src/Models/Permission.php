<?php

namespace Modules\Authetication\src\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $table = 'ktgiang_permissions';

    public function roles() {

        return $this->belongsToMany(Role::class,(config('authetication.table_prefix') ?? '') . 'roles_permissions');
            
    }
     
    public function users() {
     
        return $this->belongsToMany(User::class,(config('authetication.table_prefix') ?? '') . 'users_permissions');
            
    }
}
