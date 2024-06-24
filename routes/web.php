<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\login;
use App\Http\Controllers\forget;
use App\Http\Controllers\dasbord_user;
use App\Http\Controllers\p5grey;
use App\Http\Controllers\API\ProdukController;

Route::get('/', function () {
    return view('layout.index');
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


// update rivaldo



route::get('/admin',function(){
    return view('admin.dashboard_admin');
});
 route::get('/admin/edit',function(){
    return view('admin.edit_barang');
 });

 route::get('/admin/tambah',function(){
    return view('admin.tambah');
 });
 route::get('/admin/update',function(){
    return view('admin.update_barang');
 });

 route::get('/admin/hapus',function(){
    return view('admin.hapus_barang');
 });


// router rivaldo
Route::patch('/produk/{id}', [ProdukController::class, 'update'])->name('update_produk ');
Route::delete('/produk/{id}', [ProdukController::class, 'destroy'])->name('hapus_produk');
