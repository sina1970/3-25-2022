<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\CouponsController;
use App\Http\Controllers\RegistersController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SmsController;
use App\Http\Controllers\SendSMSController;
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

Route::get('/',function (){
    return view('welcome');
});


//Route::get('{any}',function () {
//    return view('layouts.app');})->where('any', '.*');

Route::resource('/config',SettingController::class);
//Route::resource('/admin/customers',CustomersController::class);
//Route::resource('/admin/coupons',CouponsController::class);
//Route::resource('/admin/products',ProductsController::class);
//Route::resource('/admin/sms',SmsController::class);
//Route::post('/register',[RegistersController::class,'save_user_in_database']);

Route::get('/sendsms',[SendSMSController::class,'sendbulk']);
