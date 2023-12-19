<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/hello', function () {
    return "<h1>Hello World 1</h1>";
})->name('hello');
/*
Route::get('/login', function () {
    return redirect('/user/login');
})->name('login');
*/
Route::get('/dashboard', function () {
    return "<h1>Hello World</h1>";
})->name('dashboard');

/*
Route::Fallback(function () {
    return "<h1>Đường dẫn không tồn tại, vui lòng thử lại sau.</h1>";
});
*/