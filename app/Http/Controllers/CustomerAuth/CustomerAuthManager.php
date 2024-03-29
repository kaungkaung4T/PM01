<?php

namespace App\Http\Controllers\CustomerAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerAuthManager extends Controller
{
    public function customer_login (Request $request) {
        return view('customer_auth.login');
    }

    public function post_customer_login (Request $request) {


        $credentials = Auth::guard('customer')->attempt($request->only('username', 'password'));
        if ($credentials) {
            return redirect()->intended('defaultpage');
        }
        
        return redirect()->route('customer_login')->with('fail', 'Login Failed');
    }

    public function customer_logout (Request $request) {
        Auth::guard('customer')->logout();
        return redirect()->route('customer_login')->with('success', 'Successfully Logout');
    }
}
