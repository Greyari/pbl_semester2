<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\Admin\MerekController;
use Illuminate\Support\Facades\Route;


// PRODUK
Route::get('produk', [ProdukController::class, 'index'])->name('index_produk');
Route::post('produk', [ProdukController::class, 'tambah_produk']);
Route::put('/admin/produk/{id}', [ProdukController::class, 'update']);
Route::delete('/produk/{id}', [ProdukController::class, 'delete'])->name('produk.delete');

// MEREK
Route::get('/merek', [MerekController::class, 'data_merek'])->name('index_merek');
Route::post('merek', [MerekController::class, 'tambah_merek'])->name('merek.store');
Route::put('/admin/merek/{id}', [MerekController::class, 'update']);
Route::delete('/merek/{id}', [MerekController::class, 'delete'])->name('merek.delete');

// ADMIN

    Route::get('/login', [AdminController::class, 'LoginForm'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'login'])->name('admin.login.submit');


