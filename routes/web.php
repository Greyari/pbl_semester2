<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\login;
use App\Http\Controllers\forget;
use App\Http\Controllers\dasbord_user;
use App\Http\Controllers\p5grey;

Route::get('/', function () {
    return view('index');
});

// route::get('/login',[login::class,'Halaman_login']);

// route::post('/login', [login::class, 'processLogin'])->name('login.submit');

// route::get('/forget', [forget::class, 'tampil_laman']);

// route::get('dasbord_user',[dasbord_user::class,'halaman_dasbord_admin'])->name('dasboard_user');

route::get('/regis',function(){
    return view('regis');
});

// route admind
route::get('/admin',function(){
    return view('dashboard_admin');
});


// update

use App\Http\Controllers\AdminController;

Route::get('/admin', [AdminController::class, 'index'])->name('dashboard_admind');
Route::get('/edit-barang', [AdminController::class, 'editBarang'])->name('edit-barang');
Route::get('/tambah-barang', [AdminController::class, 'tambahBarang'])->name('tambah');
Route::get('/hapus-barang', [AdminController::class, 'hapusBarang'])->name('hapus-barang');
Route::get('/update-barang', [AdminController::class, 'updateBarang'])->name('update_barang');
