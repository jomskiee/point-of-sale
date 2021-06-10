<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::namespace('App\Http\Controllers\Admin')->middleware('can:manage-users')->group(function(){
    Route::resource('/users', UsersController::class);
});
Route::namespace('App\Http\Controllers')->middleware('can:manage-users')->group(function(){
    Route::resource('/products', ProductController::class);
});
Route::namespace('App\Http\Controllers')->group(function(){
    Route::resource('/details/orders', OrderController::class);
});
Route::namespace('App\Http\Controllers')->group(function(){
    Route::resource('/details', OrderDetailsController::class);
});
Route::namespace('App\Http\Controllers')->group(function(){
    Route::resource('/transactions', TransactionController::class);
});
Route::namespace('App\Http\Controllers')->group(function(){
    Route::resource('/sales', SalesController::class);
});