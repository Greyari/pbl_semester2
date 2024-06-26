<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\JsonResponse;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function login(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'no_hp' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Email dan No Telepon yang anda masukkan salah',
                'data' => $validator->errors()
            ], 400);
        }

        $admin = Admin::where('email', $request->email)->first();

        if ($admin && $admin->no_hp === $request->no_hp) {
            $token = $admin->createToken('auth_token')->plainTextToken;

            return response()->json([
                'status' => true,
                'message' => 'Selamat datang admin',
                'data' => [
                    'token' => $token,
                    'email' => $admin->email,
                ],
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Unauthorized',
                'data' => ['error' => 'Email atau No Telepon tidak ditemukan'],
            ], 401);
        }
    }
    public function register(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:admin,email',
            'no_hp' => 'required|unique:admin,no_hp',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Registrasi gagal',
                'data' => $validator->errors()
            ], 400);
        }

        // Buat admin baru
        $admin = new Admin();
        $admin->email = $request->email;
        $admin->no_hp = $request->no_hp;
        $admin->save();

        $admin->sendEmailVerificationNotification();

        return response()->json([
            'status' => true,
            'message' => 'Registrasi berhasil',
            'data' => $admin,
        ], 201);
    }

    public function logout_admin(Request $request): JsonResponse
    {
        // Mendapatkan user yang sedang login menggunakan guard 'sanctum'
        $user = $request->user();
        if ($user) {
            // Cabut token yang sedang digunakan
            $user->currentAccessToken()->delete();

            return response()->json([
                'status' => true,
                'message' => 'Logout berhasil',
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Unauthorized',
            ], 401);
        }
    }
}
