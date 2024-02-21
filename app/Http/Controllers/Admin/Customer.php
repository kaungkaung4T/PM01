<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class Customer extends Controller
{
    public function customer (Request $request) {
        $all_user = User::all();

        $context = [
            "all_user" => $all_user
        ];
        return view('admin.customer.customer', $context);
    }
}
