<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PinjamController;
use App\Http\Controllers\KembalikanController;
use App\Http\Controllers\HistoryController;

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
Route::get('logout',[LoginController::class,'actionLogout'])->name('actionLogout')->middleware('auth');

Route::resource('/buku',BukuController::class)->middleware('auth');

Route::resource('/peminjaman',PinjamController::class)->middleware('auth');
Route::post('peminjaman/create/{id}',[PinjamController::class,'create'])->name('create')->middleware('auth');

Route::resource('/pengembalian',KembalikanController::class)->middleware('auth');
Route::post('pengembalian/kembali/{id}',[KembalikanController::class,'kembali'])->name('kembali')->middleware('auth');

Route::resource('/history',HistoryController::class)->middleware('auth');

