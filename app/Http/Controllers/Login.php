<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\VerifiesEmails;

class Login extends Controller
{

    public function index()
    {
        if ($user = Auth::user()) {
            if ($user->level == 'user') {
                return redirect()->intended('user');
            }
        }
        return view('login');
    }

    public function proses(Request $request)
    {
        $request->validate([
            'nik' => 'required',
            'password' => 'required'
        ]);
        $kredensial = $request->only('nik', 'password');
        if (Auth::attempt($kredensial)) {
            $request->session()->regenerate();
            $user = Auth::user();
            if ($user->level == 'user') {
                return redirect()->intended('user');
            }
            return redirect()->intended('login');
        }
        return redirect('login')->with([
            'gagal' => "Maaf nik atau Password anda salah",
        ])->withInput($request->only('nik'));
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }
}
