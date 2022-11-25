<?php

use App\Http\Controllers\CheckoutController;
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

Route::get('/login', [LoginController::class,'index'])->name('login')->middleware('guest');

route::get('/formCheckout', function () {return view('formCheckout');});

Route::resource('checkin', CcheckinController::class)->middleware('auth');
Route::resource('checkout', CheckoutController::class);