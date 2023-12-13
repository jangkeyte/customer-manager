<?php

use Modules\Authetication\src\Http\Controllers\User\UserController;
use Modules\Authetication\src\Http\Controllers\User\LoginController;
use Modules\Authetication\src\Http\Controllers\User\CreateUserController;
use Modules\Authetication\src\Http\Controllers\User\UpdateUserController;
use Modules\Authetication\src\Http\Controllers\User\SearchUserController;
use Modules\Authetication\src\Http\Controllers\User\ImportUserController;
/*
use Modules\Authetication\src\Http\Controllers\Auth\AuthenticatedSessionController;
use Modules\Authetication\src\Http\Controllers\Auth\ConfirmablePasswordController;
use Modules\Authetication\src\Http\Controllers\Auth\PasswordController;
use Modules\Authetication\src\Http\Controllers\Auth\RegisteredUserController;
use Modules\Authetication\src\Http\Controllers\Permission\PermissionController;
*/

use Illuminate\Support\Facades\Route;
 
Route::group(['middleware' => 'web'], function () {
    
    Route::get('/', function () {
        if(!Auth::check())
            return redirect(route('user.login'));
        else
            return redirect(route('dashboard'));
    });

    Route::group(['prefix' => 'user'], function () {
        Route::get('login', [LoginController::class, 'create']);
        Route::post('login', [LoginController::class, 'login'])->name('user.login');
        Route::get('changepwd', [UserController::class, 'changepwd'])->name('user.changepwd');
        Route::get('logout', [LoginController::class, 'destroy'])->name('user.logout');

        Route::get('detail/{id}', [UserController::class, 'show'])
            ->name('user.detail')
            ->middleware('permission:browse-user');
        
        Route::get('/', [UserController::class, 'create'])
            ->name('user')
            ->middleware('permission:browse-user');
        Route::get('remove/{id}', [UserController::class, 'destroy'])
            ->name('user.remove')
            ->middleware('permission:delete-user');
        
        // Tạo mới người dùng
        Route::get('create', [CreateUserController::class, 'create'])
            ->middleware('permission:add-user')->name('create.user');
        Route::post('create', [CreateUserController::class, 'store'])
            ->name('user.create')
            ->middleware('permission:add-user');

        // Tạo mới người dùng
        Route::get('update/{id}', [UpdateUserController::class, 'create'])
            ->middleware('permission:edit-user')->name('update.user');
        Route::post('update', [UpdateUserController::class, 'store'])
            ->name('user.update')
            ->middleware('permission:edit-user');

        // Xuất dữ người dùng
        Route::get('export', [UserController::class, 'export'])
            ->name('user.export')
            ->middleware('permission:export-user');
        Route::get('exportbycondition', [UserController::class, 'exportbycondition'])
            ->name('user.exportbycondition')
            ->middleware('permission:export-user');

        // Nhập dữ người dùng
        Route::get('import', [ImportUserController::class, 'create']);
        Route::post('import', [ImportUserController::class, 'store'])
            ->name('user.import')
            ->middleware('permission:import-user');

        // Tìm thông tin người dùng
        Route::get('search', [SearchUserController::class, 'create'])
            ->name('user.search')
            ->middleware('permission:browse-user');
        Route::post('search', [SearchUserController::class, 'store'])
            ->middleware('permission:browse-user');

        // Đăng xuất
        Route::post('logout', [LoginController::class, 'destroy'])->name('logout');
    });
    /*

    });
    */

    //Route::get('/roles', [PermissionController::class,'Permission']);

    /*
    // Đăng ký
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);

    // Đăng nhập
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
    
    */
});

Route::middleware('auth')->group(function () {
    
    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

});
