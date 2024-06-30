<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function LoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $email = $request->input('email');
        $no_hp = $request->input('no_hp');

        // Cek apakah admin dengan email dan no_hp ditemukan
        $admin = Admin::where('email', $email)
                      ->where('no_hp', $no_hp)
                      ->first();

        if ($admin) {
            if ($admin->email_verified_at == null) {
                return redirect()->route('verification.notice');
            }

            // Autentikasi admin tanpa password
            Auth::guard('admin')->login($admin);

            return redirect()->route('index_produk')->with('success', 'Selamat Datang Admin!');
        }

        return redirect()->back()->withErrors(['error' => 'Login gagal. Silakan coba lagi.']);
    }


    public function register(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'email' => 'required|email|unique:admin,email',
            'no_hp' => 'required|unique:admin,no_hp',
        ]);

        // Buat admin baru
        $admin = Admin::create([
            'email' => $request->email,
            'no_hp' => $request->no_hp
        ]);

        event(new Registered($admin));

        Auth::guard('admin')->login($admin);

        return redirect('/email/verify');
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
