<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class SystemUser extends Controller
{
    public function system (Request $request) {
        $all_user = User::all();

        $context = [
            "all_user" => $all_user
        ];
        return view('admin.system_user.system', $context);
    }

    public function create_system_user (Request $request) {

        $all_user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
            'name' => $request->name,
            'role' => $request->role,
            
        ]);
        return redirect()->route('admin.system')->with('success', 'System User Created Successfully');
    }
}
