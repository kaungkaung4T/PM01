<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Customer as ModelsCustomer;
use App\Models\User;
use Illuminate\Http\Request;

class Customer extends Controller
{
    public function customer (Request $request) {
        $all_customer = ModelsCustomer::all();

        $context = [
            "all_customer" => $all_customer
        ];
        return view('admin.customer.customer', $context);
    }
}
