<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CheckinController;
use App\Http\Controllers\LoginController;
use GuzzleHttp\Middleware;
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
Route::get('/', function(){return redirect('/login');})->middleware('guest');
Route::get('/login', [LoginController::class,'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class,'authenticate'])->middleware('guest');

Route::resource('checkin', CheckinController::class)->middleware('auth');
Route::get('checkout/dataAjax', [CheckoutController::class,'dataAjax'])->middleware('auth');
Route::resource('checkout', CheckoutController::class)->middleware('auth');
Route::get('report', function(){return view('report');});
Route::get('/logout', [LoginController::class,'logout'])->middleware('auth');