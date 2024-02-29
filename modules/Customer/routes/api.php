<?php

use Modules\Customer\src\Http\Controllers\CustomerController;

use Illuminate\Support\Facades\Route;

Route::middleware('web')->group(function () {

    Route::group(['prefix' => 'api', 'middleware' => 'auth'], function () {
        
        // Xem danh sách Khách hàng
        Route::get('/khachhang', [CustomerController::class, 'get'])->middleware('permission:browse-customer')->name('api.get');
        
        // Xem danh sách Khách hàng
        Route::get('/khachhang/{rows}/{offset}', [CustomerController::class, 'getMore'])->middleware('permission:browse-customer')->name('api.get');
        
    });
});
