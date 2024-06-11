<?php

use App\Http\Controllers\API\AdminController;
use App\Http\Controllers\API\MerekController;
use App\Http\Controllers\Api\PembeliController;
use App\Http\Controllers\API\ProdukController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// PEMBELI
Route::controller(PembeliController::class)->group(function(){
    Route::post('regis', 'regis');
    Route::post('/login', 'login');
    Route::post('forget', 'forget');
});


// ADMIN
Route::controller(AdminController::class)->group(function(){
    Route::post('login_admin', 'login_admin');
    Route::post('logout_admin', 'logout_admin');
});

Route::get('merek',[MerekController::class, 'data_merek'])->middleware('auth:sanctum');

// MEREK
Route::controller(MerekController::class)->group(function(){
    Route::post('tambah_merek', 'tambah_merek');
    Route::put('update_merek/{id}', 'update_merek');
    Route::delete('hapus_merek/{id}', 'hapus_merek');
});


// PRODUK
Route::controller(ProdukController::class)->group(function(){
    Route::get('produk', 'data_produk')->name('login');
    Route::post('tambah_produk', 'tambah_produk');
    Route::put('update_produk/{id}', 'update_produk');
    Route::delete('hapus_produk/{id}', 'hapus_produk');
});

