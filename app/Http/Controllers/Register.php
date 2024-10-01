<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Register extends Controller
{
    /**
     * Show the registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function Register(Request $request)
    {
        $request->validate([
            'nik' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = new User(); // Membuat instansi model User
        $user->nik = $request->nik;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->level = 'user';

        $user->save(); // Memanggil metode save() pada instansi model User
        return redirect()->route('login')->with('success', 'Registration successful. Please log in.')->with('username', $request->username);
    }


}
