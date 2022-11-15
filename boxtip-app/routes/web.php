<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PortalCustomerController;
use App\Http\Controllers\VoucherController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes(['register' => false]);

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Customer
Route::get('/customer', [CustomerController::class, 'index']);
Route::get('/customer/create', [CustomerController::class, 'create']);
Route::post('/customer/create', [CustomerController::class, 'store']);
Route::get('/customer/export/{ids}', [CustomerController::class, 'export']);
Route::get('/customer/{id}', [CustomerController::class, 'show']);
Route::get('/customer/{id}/edit', [CustomerController::class, 'edit']);
Route::put('/customer/{id}', [CustomerController::class, 'update']);
Route::delete('/customer/{id}', [CustomerController::class, 'destroy']);

Route::get('/portal/customer', [PortalCustomerController::class, 'create']);
Route::post('/portal/customer', [PortalCustomerController::class, 'store']);

// Voucher
Route::get('/voucher', [VoucherController::class, 'index']);
Route::get('/voucher/create', [VoucherController::class, 'create']);
Route::post('/voucher/create', [VoucherController::class, 'store']);
Route::get('/voucher/export/{ids}', [VoucherController::class, 'export']);
Route::get('/voucher/{id}', [VoucherController::class, 'show']);
Route::get('/voucher/{id}/edit', [VoucherController::class, 'edit']);
Route::put('/voucher/{id}', [VoucherController::class, 'update']);
Route::delete('/voucher/{id}', [VoucherController::class, 'destroy']);
