<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class AdminController extends Controller
{
    public function index()
    {
        return view('dashboard_admin');
    }

    public function editBarang()
    {
        return view('edit_barang',);
    }

    public function tambahBarang()
    {
        return view('tambah');
    }

    public function hapusBarang()
    {
        return view('hapus_barang');
    }

    public function updatebarang()
    {
        return view('update_barang');
    }
}
