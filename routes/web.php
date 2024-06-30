<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\Admin\MerekController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;

// Admin login routes
Route::get('/login', [AdminController::class, 'LoginForm'])->name('admin.login');
Route::post('/login', [AdminController::class, 'login'])->name('admin.login.submit');
Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');
Route::post('/register', [AdminController::class, 'register'])->name('admin.register.submit');

// Rute untuk verifikasi email
Route::get('/email/verify', function () {
    return view('admin.verify-email');
})->middleware('auth:admin')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect()->route('index_produk');
})->middleware(['auth:admin', 'signed'])->name('verification.verify');

// Rute yang memerlukan autentikasi dan verifikasi email
Route::middleware(['auth:admin', 'verified'])->group(function () {
    // Route untuk produk
    Route::get('produk', [ProdukController::class, 'index'])->name('index_produk');
    Route::post('produk', [ProdukController::class, 'tambah_produk']);
    Route::put('/admin/produk/{id}', [ProdukController::class, 'update']);
    Route::delete('/produk/{id}', [ProdukController::class, 'delete'])->name('produk.delete');
    // Route untuk merek
    Route::get('/merek', [MerekController::class, 'data_merek'])->name('index_merek');
    Route::post('merek', [MerekController::class, 'tambah_merek'])->name('merek.store');
    Route::put('/admin/merek/{id}', [MerekController::class, 'update']);
    Route::delete('/merek/{id}', [MerekController::class, 'delete'])->name('merek.delete');
});

// route::get('/tes', function(){
//     echo "halo ini tes kali lo";
// })->name;


