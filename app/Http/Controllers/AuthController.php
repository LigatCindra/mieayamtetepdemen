<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        return view('login/login');
    }


    public function loginPost(Request $request){
        $credentials = $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);

        if(auth()->attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/admin')->with('success', 'Login Berhasil');
        }

        return back()->with('error', 'Username atau Password salah');
    }

    public function logout(){
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/');
    }
}
