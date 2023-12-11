<?php

namespace Modules\Authetication\src\Traits;

use Modules\Authetication\src\Models\Permission;
use Modules\Authetication\src\Models\Role;

trait HasPermissionsTrait {

  public function roles() {
    return $this->belongsToMany(Role::class,(config('authetication.table_prefix') ?? '') . 'users_roles');
  }

  public function permissions() {
    return $this->belongsToMany(Permission::class,(config('authetication.table_prefix') ?? '') . 'users_permissions');
  }

  /**
   * Cấp quyền hạn chỉ định cho user
   */
  public function givePermissionsTo(... $permissions) {
    $permissions = $this->getAllPermissions($permissions);
    //dd($permissions);
    if($permissions === null) {
      return $this;
    }
    $this->permissions()->saveMany($permissions);
    return $this;
  }

  /**
   * Xóa bỏ toàn bộ quyền hạn
   */
  public function removeAllPermissions() {
    $this->permissions()->detach();
    return $this;
  }

  /**
   * Xóa bỏ các quyền hạn được chỉ định
   */
  public function withdrawPermissionsTo( ... $permissions ) {
    $permissions = $this->getAllPermissions($permissions);
    $this->permissions()->detach($permissions);
    return $this;
  }

  /**
   * Làm mới toàn bộ quyền hạn
   */
  public function refreshPermissions( ... $permissions ) {
    $this->permissions()->detach();
    return $this->givePermissionsTo($permissions);
  }

  /**
   * Kiểm tra quyền hạn chỉ định của user thông qua role và quyền mặc định
   */
  public function hasPermissionTo($permission) {
    return $this->hasPermissionThroughRole($permission) || $this->hasPermission($permission);
  }

  /**
   * Kiểm tra quyền hạn của user thông qua role
   */
  public function hasPermissionThroughRole($permission) {
    foreach ($permission->roles as $role){
      if($this->roles->contains($role)) {
        return true;
      }
    }
    return false;
  }

  /**
   * Kiểm tra vai trò chỉ định của user
   */
  public function hasRole( ... $roles ) {
    foreach ($roles as $role) {
      if ($this->roles->contains('slug', $role)) {
        return true;
      }
    }
    return false;
  }

  /**
   * Kiểm tra quyền hạn chỉ định của user
   */
  protected function hasPermission($permission) {
    return (bool) $this->permissions->where('slug', $permission->slug)->count();
  }

  /**
   * Lấy tất cả quyền hạn giống với quyền chỉ định
   */
  protected function getAllPermissions(array $permissions) {
    return Permission::whereIn('slug', $permissions)->get();
  }
 
}