<?php

use Modules\Customer\src\Http\Controllers\ProfileController;
use Modules\Customer\src\Http\Controllers\CustomerController;
use Modules\Customer\src\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/storage',  [CustomerController::class, 'index'])->middleware(['auth', 'verified'])->name('storage');

Route::get('/cavet',  [CustomerController::class, 'index'])->middleware(['auth', 'verified'])->name('cavet');

Route::get('/dashboard', function () {
    return redirect(route('client'));
})->name('dashboard');

Route::get('/customer-dashboard',  [CustomerController::class, 'index'])->middleware(['auth', 'verified'])->name('customer-dashboard');

Route::get('/client-dashboard',  [CustomerController::class, 'index'])->middleware(['auth', 'verified'])->name('client-dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
