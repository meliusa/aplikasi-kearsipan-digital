<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validasi data dari frontend
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Mencari pengguna berdasarkan email
        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            // Jika login berhasil, buat session atau token (misalnya menggunakan Auth::login())
            Auth::login($user);

            // Return response sukses
            return response()->json([
                'status' => 'success',
                'message' => 'Login berhasil!'
            ]);
        }

        // Jika login gagal
        return response()->json([
            'status' => 'error',
            'message' => 'Email atau kata sandi salah'
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Log out pengguna

        // Hapus sesi dan token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect ke halaman login setelah logout
        return redirect()->route('login');
    }
}
