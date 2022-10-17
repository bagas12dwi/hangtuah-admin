<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EkstrakurikulerController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\TestiController;
use App\Http\Controllers\TestimonialController;
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

Route::get('/', [AuthController::class, 'index'])->middleware('guest');

//Route auth
Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);


//Route admin
Route::group(['middleware' => ['auth', 'ceklevel:admin']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::get('/testimoni', [TestimonialController::class, 'index']);
    Route::resource('testimoni', TestiController::class);

    Route::get('/prestasi', [PrestasiController::class, 'index']);
    Route::resource('prestasi', PrestasiController::class);

    Route::resource('ekstrakurikuler', EkstrakurikulerController::class);
    Route::resource('pegawai', PegawaiController::class);
});
