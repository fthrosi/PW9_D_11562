<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[LoginController::class,'login'])->name('login');
Route::post('actionLogin',[LoginController::class,'actionLogin'])->name('actionLogin');

Route::get('register',[RegisterController::class,'register'])->name('register');
Route::post('actionRegister',[RegisterController::class,'actionRegister'])->name('actionRegister');
Route::get('register/verify/{verify_key}',[RegisterController::class,'verify'])->name('verify');

Route::get('home',[HomeController::class,'index'])->name('home')->middleware('auth');
Route::get('logout',[LoginController::class,'actionLogout'])->name('ctionLogout')->middleware('auth');
