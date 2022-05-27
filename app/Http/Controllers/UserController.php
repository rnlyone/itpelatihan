<?php

namespace App\Http\Controllers;

use App\Models\Pelatihan;
use App\Models\Pengaturan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function indexLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        $attr = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8'],
        ]);

        if (Auth::attempt($attr)){
            Auth::login($user);
    return redirect()->intended('/dash')->with('sukses', "Login Sukses");
        } else {
            return back()->with('gagal', 'Username / Password Salah!');
        }

    }

    public function logout()
    {
        Auth::logout();
        return redirect()->intended('/login')->with('sukses', 'logout berhasil');
    }

    public function indexDash()
    {
        $pelatihandata = Pelatihan::all();
        $reks = Pengaturan::all();
        return view('auth.dashboard', ['pelatihandata' => $pelatihandata, 'rekening' => $reks]);
    }
}
