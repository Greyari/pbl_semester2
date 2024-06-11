<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProdukController extends Controller
{

    // MEREK
    public function data_produk(){
        $data = Produk::orderBy('nama', 'asc')->get();
        return response()->json([
            'status'=>true,
            'mesege'=>'Data ditemukan',
            'data' =>$data
        ], 200);
    }

    // TAMBAH
    public function tambah_produk(Request $request)
    {
        $rules = [
            'nama' => 'required|unique:produk,nama',
            'id_merek' => 'required|exists:merek,id',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return response()->json([
                'status' => false,
                'message' => 'Poduk tidak bisa di tambahkan',
                'errors' => $validator->errors()
            ], 422);
        }

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $path = $file->store('images', 'public');
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Gambar tidak ditemukan'
            ], 422);
        }

        $produk = new Produk();
        $produk->nama = $request->nama;
        $produk->id_merek = $request->id_merek;
        $produk->deskripsi = $request->deskripsi;
        $produk->harga = $request->harga;
        $produk->stok = $request->stok;
        $produk->gambar = $path;

        $produk->save();

        return response()->json([
            'status' => true,
            'message' => 'Sukses menambahkan produk',
            'data' => $produk
        ], 201);
    }

    // UPDATE
    public function update_produk(Request $request, string $id)
    {
        $produk = Produk::find($id);
        if (empty($produk)) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal menemukan produk',
            ], 404);
        }

        $rules = [
            'nama' => 'required',
            'id_merek' => 'required|exists:merek,id',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Tidak dapat memperbaruhi merek',
                'data' => $validator->errors()
            ], 404);
        }

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $path = $file->store('images', 'public');

            if($produk->gambar) {
                Storage::disk('public')->delete($produk->gambar);
            }

            $produk->gambar = $path;
        }

        $produk->nama = $request->nama;
        $produk->id_merek = $request->id_merek;
        $produk->deskripsi = $request->deskripsi;
        $produk->harga = $request->harga;
        $produk->stok = $request->stok;

        $produk->save();

        return response()->json([
            'status' => true,
            'message' => 'Sukses memperbarui produk',
            'data' => $produk
        ], 200);
    }

    // HAPUS
    public function hapus_produk(string $id)
    {
        $produk = Produk::find($id);

        if (is_null($produk)) {
            return response()->json([
                'status' => false,
                'message' => 'Produk tidak ditemukan'
            ], 404);
        }

        $produk->delete();

        return response()->json([
            'status' => true,
            'message' => 'Sukses menghapus produk',
        ], 200);
    }
}
