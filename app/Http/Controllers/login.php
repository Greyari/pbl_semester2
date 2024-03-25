<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class login extends Controller
{
    public function Halaman_login(){
        return view('login');
    }

    public function processLogin(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        view('/login')->name('/login');
        if ($username === '123' && $password === '321') {
            return redirect()->route('dasboard_user');
        } else {
            return redirect()->route('/login')->with('error', 'Username atau password salah');
        }
    }

}
?>
