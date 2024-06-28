<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class AdminController extends Controller
{
    
    public function LoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        // Ambil email dan nomor hp dari input request
        $email = $request->input('email');
        $no_hp = $request->input('no_hp');

        // Buat instansiasi dari Guzzle Client
        $client = new Client;

        // URL untuk endpoint login_admin di API
        $url = "http://localhost:8000/api/login_admin";

        try {
            // Lakukan request POST ke endpoint dengan mengirimkan data email dan no_hp
            $response = $client->request('POST', $url, [
                'form_params' => [
                    'email' => $email,
                    'no_hp' => $no_hp,
                ]
            ]);

            // Ambil konten dari respons
            $content = $response->getBody()->getContents();

            // Decode konten JSON menjadi array asosiatif
            $contentArray = json_decode($content, true);

            // Ambil data yang diperlukan dari respons
            $data = $contentArray['data'];

            // Kirimkan data ke view admin.login
            return redirect()->to('merek')->with('success', 'Selamat Datang Admin!');

        } catch (\Exception $e) {
            // Tangani exception jika terjadi kesalahan dalam melakukan request ke API
            return redirect()->back()->withErrors(['error' => 'Failed to login. Please try again.']);
        }
    }
}
