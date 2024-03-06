<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\login;
use App\Http\Controllers\dasbord_user;

Route::get('/', function () {
    return view('index');
});

route::get('/login',[login::class,'Halaman_login']);


route::post('/login', [login::class, 'processLogin'])->name('login.submit');

route::get('dasbord_user',[dasbord_user::class,'halaman_dasbord_admin'])->name('dasboard_user');
