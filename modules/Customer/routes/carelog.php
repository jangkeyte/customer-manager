<?php

use Modules\Customer\src\Http\Controllers\CareLog\CreateCareLogController;
use Illuminate\Support\Facades\Route;

Route::middleware('web')->group(function () {

    Route::group(['prefix' => 'carelog', 'middleware' => 'auth'], function () {
        
        Route::get('create/{ma_khach_hang}', [CreateCareLogController::class, 'create'])
            ->name('carelog.create');

        Route::post('carelog', [CreateCareLogController::class, 'store'])
            ->name('create.carelog');
    });

});