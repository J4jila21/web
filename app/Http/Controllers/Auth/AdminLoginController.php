<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    /**
     * Tampilkan halaman login admin.
     */
    public function showLoginForm()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('auth.login');
    }

    /**
     * Proses login admin
     */
    public function login(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $remember = $request->has('remember');
        // Coba login menggunakan guard 'admin'
        if (Auth::guard('admin')->attempt($credentials, $remember )) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard'); // redirect ke dashboard admin
        }

        // Jika gagal login
        return back()->withErrors([
            'email' => 'Email atau password admin salah.',
        ]);
    }

    /**
     * Logout admin
     */
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect ke halaman login admin
        return redirect('/dashboard/login');
    }
}
