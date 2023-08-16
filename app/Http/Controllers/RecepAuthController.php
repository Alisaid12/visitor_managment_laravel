<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RecepAuthController extends Controller
{
    public function index()
    {
        return view('auth.login_recep');
    }
    public function accueil_login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credential = $request->only('email', 'password');

        if (Auth::attempt($credential)) {
            return redirect()->intended('dashboard')->withSuccess('Login');
        }

        return redirect('login_recep')->with('error', 'Login Details are not valid');
    }
    public function dashboard()
    {
        if (Auth::check()) {
            return view('dashboard');
        }
        return redirect('login_recep');
    }
    public function logout()
    {
        // Session::flush();
        Auth::logout();
        return redirect('login_recep');
    }
}