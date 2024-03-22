<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Bank extends Controller
{
    public function bank (Request $request) {

        $customer_id = Auth::guard('customer')->id();
        $customer = Customer::find($customer_id);

        $context = [
            'customer' => $customer
        ];

        return view('front_end.bank', $context);
    }

    public function bank_add (Request $request) {

        $customer_id = Auth::guard('customer')->id();
        $customer = Customer::find($customer_id);

        $context = [
            'customer' => $customer
        ];

        return view('front_end.bank_add', $context);
    }
}