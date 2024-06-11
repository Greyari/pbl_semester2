<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Pembeli;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PembeliController extends BaseController
{


    public function halaman_regis()
    {
        return view('');
    }

    //
    // ***REGIS***
    //
    public function regis (Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(),
        [
            'nama' => 'required',
            'email' => 'required|email|unique:pembeli,email',
            'password' => 'required',
            'password2' => 'required|same:password',
        ]);

        if ($validator->fails()){
            return $this->sendError('validation error!', $validator->errors());
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = Pembeli::create($input);
        $succes['token'] = $user->createToken('aout_token')->plainTextToken;
        $succes['name'] = $user->name;

        return $this->sendResponse($succes, 'Berhasil menambahkan akun');
    }

    //
    // ***LOGIN**
    //
    public function login(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation error!', $validator->errors());
        }

        $credentials = $request->only('email', 'password');

        if (Auth::guard('pembeli')->attempt($credentials)) {
            $pembeli = Auth::guard('pembeli')->user();

            $user = Pembeli::where(['email' => $request->email])->first();

            $success['token'] = $user->createToken('auth_token')->plainTextToken;
            $success['nama'] = $pembeli->nama;

            return $this->sendResponse($success, 'Berhasil login');
        } else {
            return $this->sendError('Unauthorized!', ['error' => 'Email atau password salah']);
        }
    }

    //
    // ***FORGET***
    //
    public function halaman_forget()
    {
        return view('');
    }
    public function update(Request $request, string $id)
    {

    }

}
