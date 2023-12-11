<?php

use Modules\Customer\src\Http\Controllers\CareLog\CreateCareLogController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {

    Route::get('chamsockhachhang/{khach_hang}', [CreateCareLogController::class, 'create'])
                ->name('chamsockhachhang');

    Route::post('carelog_add', [CreateCareLogController::class, 'store'])->name('carelog_add');

});