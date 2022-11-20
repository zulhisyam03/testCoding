<?php

use App\Http\Controllers\CalonController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

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

Route::get('/', function () {return view('welcome');})->middleware('guest');

Route::get('/login', [LoginController::class,'index'])->name('login')->middleware('guest');
Route::post('/login',[LoginController::class,'authenticate']);
Route::get('/home',[CalonController::class,'index'])->name('home')->middleware('auth');
Route::post('/logout',[LoginController::class,'logout'])->middleware('auth');
Route::resource('/candidate',CalonController::class)->middleware('auth');
// Route::get('/show/{candidate_id}',[CalonController::class,'show'])->middleware('auth');
