<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RespoAuthController extends Controller
{
    public function index()
    {
        return view('auth.login_respo');
    }
    public function respo_login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credential = $request->only('email', 'password');

        if (Auth::attempt($credential)) {
            return redirect()->intended('dashboard')->withSuccess('Login');
        }

        return redirect('login_respo')->with('error', 'Login Details are not valid');
    }
    public function dashboard()
    {
        if (Auth::check()) {
            return view('dashboard');
        }
        return redirect('login_respo');
    }
    public function logout()
    {
        // Session::flush();
        Auth::logout();
        return redirect('login_respo');
    }
}
