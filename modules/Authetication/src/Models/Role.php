<?php

namespace Modules\Authetication\src\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'ktgiang_roles';

    public function permissions() {

        return $this->belongsToMany( Permission::class, ( config( 'authetication.table_prefix' ) ?? '' ) . 'roles_permissions' );
            
    }
    
    public function users() {
     
        return $this->belongsToMany( User::class, ( config( 'authetication.table_prefix' ) ?? '' ) . 'users_roles' );
            
    }
}
