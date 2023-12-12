<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function register()
    {
        return view('login/register');
    }

    public function registerPost(){
        request()->validate([
            'name' => 'required',
            'password' => 'required',
            'original_admin_password' => 'required', // Add validation for the original admin password
        ]);

        $originalAdmin = User::find(2);
        $adminVerify = request()->input('original_admin_password');

        if (!password_verify($adminVerify, $originalAdmin->password)) {
            return back()->with('error', 'Original Admin Password is incorrect');
        }

        User::create([
            'name' => request()->input('name'),
            'password' => Hash::make(request()->input('password')),
        ]);

        return back()->with('success', 'Akun admin terbaru telah dibuat');

    }




}
