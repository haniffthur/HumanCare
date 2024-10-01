<?php

// app/Http/Controllers/ResetPasswordController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ResetPasswordController extends Controller
{
    public function showResetForm()
    {
        return view('auth.reset_password');
    }

    public function reset(Request $request)
    {
        $request->validate([
            'nik' => 'required',
            'password' => 'required',
            'email' => 'required'
        ]);

        $user = User::where('nik', $request->nik)->first();
        if (!$user) {
            return back()->withErrors(['nik' => 'Nik tidak ditemukan']);
        }
        if (strcasecmp(trim($user->email), trim($request->email)) !== 0) {
            return back()->withErrors(['email' => 'Alamat email tidak sesuai']);
        }
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('login')->with('status', 'Password berhasil direset. Silakan login.');
    }
}
