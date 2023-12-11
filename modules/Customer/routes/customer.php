<?php

use Modules\Customer\src\Http\Controllers\CustomerController;
use Modules\Customer\src\Http\Controllers\Customer\CreateCustomerController;
use Modules\Customer\src\Http\Controllers\Customer\UpdateCustomerController;
use Modules\Customer\src\Http\Controllers\Customer\RemoveCustomerController;
use Modules\Customer\src\Http\Controllers\Customer\SearchCustomerController;
use Illuminate\Support\Facades\Route;

Route::middleware('web')->group(function () {

    Route::group(['prefix' => 'customer'], function () {
        
        // Xem danh sách Khách hàng
        Route::get('/', [CustomerController::class, 'create'])
            ->middleware('permission:browse-customer')
            ->name('customer');
            
        // Xem thông tin khách hàng
        Route::get('detail/{ma_khach_hang}', [CustomerController::class, 'show'])
            ->middleware('permission:read-customer')
            ->name('detail.customer');
        
        // Tạo mới khách hàng
        Route::get('create', [CreateCustomerController::class, 'create'])
            ->middleware('permission:add-customer')
            ->name('create.customer');
        Route::post('create', [CreateCustomerController::class, 'store'])
            ->middleware('permission:add-customer')
            ->name('customer.create');        

        // Cập nhật khách hàng
        Route::get('update/{id}', [UpdateCustomerController::class, 'create'])
            ->middleware('permission:edit-customer')
            ->name('update.customer');
        Route::post('update', [UpdateCustomerController::class, 'store'])
            ->middleware('permission:edit-customer')
            ->name('customer.update');

        // Xóa khách hàng
        Route::get('remove/{id}', [RemoveCustomerController::class, 'create'])
            ->middleware('permission:delete-customer')
            ->name('remove.customer');
        Route::post('remove', [RemoveCustomerController::class, 'store'])
            ->middleware('permission:delete-customer')
            ->name('customer.remove');
        
        // Tìm thông tin khách hàng
        Route::get('search', [SearchCustomerController::class, 'create'])
            ->middleware('permission:browse-customer')
            ->name('search.customer');
        Route::post('search', [SearchCustomerController::class, 'store'])
            ->middleware('permission:browse-customer')
            ->name('customer.search');        

        // Xuất dữ liệu khách hàng
        Route::get('export', [UserController::class, 'export'])
            ->name('customer.export')
            ->middleware('permission:export-customer');
        Route::get('exportbycondition', [UserController::class, 'exportbycondition'])
            ->name('customer.exportbycondition')
            ->middleware('permission:export-customer');

        // Nhập dữ liệu khách hàng
        Route::get('import', [ImportCustomerController::class, 'create']);
        Route::post('import', [ImportCustomerController::class, 'store'])
            ->name('customer.import')
            ->middleware('permission:import-customer');
    });
    
    Route::group(['prefix' => 'client'], function () {
        
        // Xem danh sách Khách hàng
        Route::get('/', [CustomerController::class, 'create'])
            ->middleware('permission:browse-customer')
            ->name('client');
            
        // Xem thông tin khách hàng
        Route::get('detail/{ma_khach_hang}', [CustomerController::class, 'show'])
            ->middleware('permission:read-customer')
            ->name('detail.client');
        
        // Tạo mới khách hàng
        Route::get('create', [CreateCustomerController::class, 'create'])
            ->middleware('permission:add-customer')
            ->name('create.client');
        Route::post('create', [CreateCustomerController::class, 'store'])
            ->middleware('permission:add-customer')
            ->name('client.create');        

        // Cập nhật khách hàng
        Route::get('update/{id}', [UpdateCustomerController::class, 'create'])
            ->middleware('permission:edit-customer')
            ->name('update.client');
        Route::post('update', [UpdateCustomerController::class, 'store'])
            ->middleware('permission:edit-customer')
            ->name('client.update');

        // Xóa khách hàng
        Route::get('remove/{id}', [RemoveCustomerController::class, 'create'])
            ->middleware('permission:delete-customer')
            ->name('remove.client');
        Route::post('remove', [RemoveCustomerController::class, 'store'])
            ->middleware('permission:delete-customer')
            ->name('client.remove');
        
        // Tìm thông tin khách hàng
        Route::get('search', [SearchCustomerController::class, 'create'])
            ->middleware('permission:browse-customer')
            ->name('search.client');
        Route::post('search', [SearchCustomerController::class, 'store'])
            ->middleware('permission:browse-customer')
            ->name('client.search');        

        // Xuất dữ liệu khách hàng
        Route::get('export', [UserController::class, 'export'])
            ->name('customer.export')
            ->middleware('permission:export-customer');
        Route::get('exportbycondition', [UserController::class, 'exportbycondition'])
            ->name('customer.exportbycondition')
            ->middleware('permission:export-customer');

        // Nhập dữ liệu khách hàng
        Route::get('import', [ImportCustomerController::class, 'create']);
        Route::post('import', [ImportCustomerController::class, 'store'])
            ->name('customer.import')
            ->middleware('permission:import-customer');
    });
});
