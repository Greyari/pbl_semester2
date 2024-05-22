<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\login;
use App\Http\Controllers\forget;
use App\Http\Controllers\dasbord_user;
use App\Http\Controllers\p5grey;
use App\Http\Controllers\contoh;

Route::get('/', function () {
    return view('index');
});

route::get('/login',[login::class,'Halaman_login'])->name('login');

route::post('/login', [login::class, 'processLogin'])->name('login.submit');

route::get('/forget', [forget::class, 'tampil_laman']);

route::get('dasbord_user',[dasbord_user::class,'halaman_dasbord_admin'])->name('dasboard_user');

route::get('/regis',function(){
    return view('regis');
});

route::get('/contoh', function (){
    return view('tiwland');
});
