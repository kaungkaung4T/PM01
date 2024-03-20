<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Index extends Controller
{
    public function index (Request $request) {

        $packages = Package::all();
        $customer_id = Auth::guard('customer')->id();
        $customer = Customer::find($customer_id);

        $context = [
            'packages' => $packages,
            'customer' => $customer
        ];

        return view('front_end.index', $context);
    }
}
