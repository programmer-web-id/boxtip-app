<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PortalCustomerController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\CityController;
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
Route::post('/customer/archive/{ids}', [CustomerController::class, 'archive']);
Route::post('/customer/unarchive/{ids}', [CustomerController::class, 'unarchive']);
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

// Province
Route::get('/province', [ProvinceController::class, 'index']);
Route::get('/province/create', [ProvinceController::class, 'create']);
Route::post('/province/create', [ProvinceController::class, 'store']);
Route::get('/province/{id}', [ProvinceController::class, 'show']);
Route::get('/province/{id}/edit', [ProvinceController::class, 'edit']);
Route::put('/province/{id}', [ProvinceController::class, 'update']);
Route::delete('/province/{id}', [ProvinceController::class, 'destroy']);

// City
Route::get('/city', [CityController::class, 'index']);
Route::get('/city/create', [CityController::class, 'create']);
Route::post('/city/create', [CityController::class, 'store']);
Route::get('/city/{id}', [CityController::class, 'show']);
Route::get('/city/{id}/edit', [CityController::class, 'edit']);
Route::put('/city/{id}', [CityController::class, 'update']);
Route::delete('/city/{id}', [CityController::class, 'destroy']);

// Region
Route::get('/data/city/{id}', [ProvinceController::class, 'getCities']);
Route::get('/data/district/{id}', [CityController::class, 'getDistricts']);
