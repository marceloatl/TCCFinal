<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.index');

Route::resource('users', App\Http\Controllers\Admin\UserController::class);
Route::resource('/produtos', App\Http\Controllers\Admin\ProdutoController::class);
Route::resource('/picklists', App\Http\Controllers\Admin\PicklistController::class);
Route::resource('/workorders', App\Http\Controllers\Admin\WorkorderController::class);
