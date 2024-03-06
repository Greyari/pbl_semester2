<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dasbord_user extends Controller
{
    public function halaman_dasbord_admin(){
        return view('dasbord_user');
    }

}

