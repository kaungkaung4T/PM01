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
}
