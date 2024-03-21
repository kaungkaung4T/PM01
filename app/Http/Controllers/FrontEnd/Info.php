<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Info extends Controller
{
    public function info (Request $request) {

        $customer_id = Auth::guard('customer')->id();
        $customer = Customer::find($customer_id);

        $context = [
            'customer' => $customer
        ];

        return view('front_end.info', $context);
    }
}
