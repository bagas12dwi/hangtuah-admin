<?php

use App\Http\Controllers\API\BeritaController;
use App\Http\Controllers\API\EkstrakurikulerController;
use App\Http\Controllers\API\GaleriController;
use App\Http\Controllers\API\PegawaiController;
use App\Http\Controllers\API\PrestasiController;
use App\Http\Controllers\API\TestimonialController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::group(['middleware' => ['cors']], function () {
    Route::get('/testimoni', [TestimonialController::class, 'index']);
    Route::get('/prestasi', [PrestasiController::class, 'index']);
    Route::get('/ekstrakurikuler', [EkstrakurikulerController::class, 'index']);
    Route::get('/galeri', [GaleriController::class, 'index']);
    Route::get('/pegawai', [PegawaiController::class, 'index']);
    Route::resource('berita', BeritaController::class);
});
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
