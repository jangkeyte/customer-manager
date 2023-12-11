<?php

use App\Http\Controllers\ImportController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {

    Route::get('nhapdulieu', [ImportController::class, 'index'])
                ->name('nhapdulieu');

    Route::post('nhapkhachhang', [ImportController::class, 'importCustomer'])
                ->name('nhapkhachhang');

    Route::post('nhapchamsockhach', [ImportController::class, 'importCareLog'])
                ->name('nhapchamsockhach');

    Route::post('nhapnguoidung', [ImportController::class, 'importUser'])
                ->name('nhapnguoidung');

});