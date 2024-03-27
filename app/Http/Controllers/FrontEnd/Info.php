<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function change_info (Request $request) {

        $customer_id = Auth::guard('customer')->id();
        $customer = Customer::find($customer_id);

        $customer->update([
            'username'=> $request->username,
            'phone'=> $request->phone,
            'nric'=> $request->nric
        ]);

        $context = [
            'customer' => $customer
        ];

        return redirect()->back()->with('message', 'Info successfully changed!');
    }

    public function change_password (Request $request) {

        $customer_id = Auth::guard('customer')->id();
        $customer = Customer::find($customer_id);

        $customer->update([
            'password' => Hash::make($request->password)
        ]);

        $context = [
            'customer' => $customer
        ];

        return redirect()->back()->with('message', 'Password successfully changed!');
    }
}
