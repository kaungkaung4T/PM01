<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\Customer;
use App\Models\Package as ModelsPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Package extends Controller
{
    public function package (Request $request) {

        $packages = ModelsPackage::all();
        $customer_id = Auth::guard('customer')->id();
        $customer = Customer::find($customer_id);

        $customer_banks = Bank::where("customer_id", $customer_id)->get();

        $context = [
            'packages' => $packages,
            'customer' => $customer,
            'customer_banks' => $customer_banks
        ];

        return view('front_end.package', $context);
    }
}
