<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Setting extends Controller
{
    public function admin_setting (Request $request, $id) {
        $each_user = User::find($id);
        
        $context = [
            'each_user' => $each_user
        ];
        return view('admin.setting', $context);
    }

    public function update_admin_name (Request $request, $id) {
        $each_user = User::find($id);
        
        $each_user->update([
            'username' => $request->username
        ]);
        $context = [
            'each_user' => $each_user
        ];
        return redirect()->route('admin.setting', $id)->with('success', 'Name Updated Successfully');
    }

    public function update_admin_password (Request $request, $id) {
        $each_user = User::find($id);
        
        $each_user->update([
            'password' => Hash::make($request->password)
        ]);
        $context = [
            'each_user' => $each_user
        ];
        return redirect()->route('admin.setting', $id)->with('success', 'Password Updated Successfully');
    }
}
