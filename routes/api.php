<?php

use App\Http\Controllers\SendSMSController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\CouponsController;
use App\Http\Controllers\RegistersController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SmsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoicesController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//
//Route::resource('/config',SettingController::class);
Route::resource('/admin/customers',CustomersController::class);
Route::resource('/admin/coupons',CouponsController::class);
Route::resource('/admin/products',ProductsController::class);
Route::resource('/admin/sms',SmsController::class);
Route::resource('/admin/invoices',InvoicesController::class);
Route::post('/register',[RegistersController::class,'save_user_in_database']);
Route::get('/home',[HomeController::class,'index']);
//Route::post('/sendsms',[SendSMSController::class,'sendbulk']);
