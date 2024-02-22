<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthManager extends Controller
{
    public function login (Request $request) {
        return view('auth.login');
    }

    public function post_login (Request $request) {
        $request->validate([
            'username'=> 'required',
            'password'=> 'required'
        ]);

        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('admin.dashboard')->with('success', 'Successfully Login');
        }
        
        return redirect()->route('login')->with('fail', 'Login Failed');
    }
}
