<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Tampilkan halaman login
     */
    public function login()
    {
        return view('auth.login');
    }

    /**
     * Proses login
     */
    public function postLogin(Request $request)
    {
        // 1. Validasi input
        $validator = Validator::make($request->all(), [
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'   => false,
                'message'  => 'Validasi gagal.',
                'msgField' => $validator->errors()
            ]);
        }

        // 2. Cek username dan password (pakai md5 jika itu yang digunakan di database)
        $user = DB::table('users') // ganti nama tabel jika perlu
            ->where('username', $request->username)
            ->where('password', md5($request->password)) // GUNAKAN md5 jika password di DB berupa md5
            ->first();

        if ($user) {
            // 3. Simpan data user ke session
            $request->session()->put('user', $user);

            return response()->json([
                'status'   => true,
                'message'  => 'Login berhasil!',
                'redirect' => url('/') // arahkan ke dashboard
            ]);
        }

        // 4. Jika tidak cocok
        return response()->json([
            'status'   => false,
            'message'  => 'Username atau password salah.',
            'msgField' => [
                'username' => ['Username atau password salah.']
            ]
        ]);
    }

    /**
     * Logout
     */
    public function logout(Request $request)
    {
        $request->session()->forget('user'); // hapus session user
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
