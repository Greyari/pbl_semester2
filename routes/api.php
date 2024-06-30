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
    Route::post('login_admin', 'login');
    Route::post('logout_admin', 'logout_admin');
    Route::post('/register_admin', 'register')->name('api.admin.register');
});
// MEREK
Route::controller(MerekController::class)->group(function(){
    Route::get('merek', 'data_merek');
    Route::post('tambah_merek', 'tambah_merek');
    Route::put('update_merek/{id}', 'update_merek');
    Route::delete('hapus_merek/{id}', 'hapus_merek');
});
// PRODUK
Route::controller(ProdukController::class)->group(function(){
    Route::get('produk', 'data_produk');
    Route::post('tambah_produk', 'tambah_produk');
    Route::put('update_produk/{id}', 'update_produk_id');
    Route::delete('hapus_produk/{id}', 'hapus_produk');
});

