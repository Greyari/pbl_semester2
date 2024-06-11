<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Merek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MerekController extends Controller
{
    // MEREK
    public function data_merek(){
        $data = Merek::orderBy('nama_merek')->get();
        return response()->json([
            'status'=>true,
            'mesege'=>'Data ditemukan',
            'data' =>$data
        ], 200);
    }

    // TAMBAH
    public function tambah_merek(Request $request)
    {
        $rules = [
            'nama_merek' => 'required|unique:merek,nama_merek'
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return response()->json([
                'status' => false,
                'message' => 'Merek sudah terdaftar',
            ]);
        }

        $merek = new Merek();
        $merek->nama_merek = $request->nama_merek;

        $merek->save();

        return response()->json([
            'status' => true,
            'message' => 'Sukses menambahkan merek',
            'data' => $merek
        ], 201);
    }

    // UPDATE
    public function update_merek(Request $request, string $id)
    {
        $merek = Merek::find($id);
        if (empty($merek)) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal menemukan merek',
            ], 404);
        }

        $rules = [
            'nama_merek' => 'required|unique:merek,nama_merek,'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Tidak dapat memperbaharui merek',
                'data' => $validator->errors()
            ]);
        }

        $merek->nama_merek = $request->nama_merek;

        $merek->save();

        return response()->json([
            'status' => true,
            'message' => 'Sukses memperbarui merek',
            'data' => $merek
        ], 200);
    }

    // HAPUS
    public function hapus_merek(string $id_merek)
    {
        $merek = Merek::find($id_merek);

        if (is_null($merek)) {
            return response()->json([
                'status' => false,
                'message' => 'Produk tidak ditemukan'
            ], 404);
        }

        $merek->delete();

        return response()->json([
            'status' => true,
            'message' => 'Sukses menghapus merek',
        ], 200);
    }
}
