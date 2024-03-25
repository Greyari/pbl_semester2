<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class forget extends Controller
{
    public function tampil_laman(){
        return view('forget_password');
    }
}
