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

Route::get('/', function () {return redirect('/login');});

Route::get('/login', [LoginController::class,'index'])->name('login')->middleware('guest');
Route::get('/dashboard',[CalonController::class,'index'])->middleware('auth');
Route::post('/login',[LoginController::class,'authenticate']);
