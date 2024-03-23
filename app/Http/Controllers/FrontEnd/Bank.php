<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Bank as ModelsBank;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class Bank extends Controller
{
    public function bank (Request $request) {

        $customer_id = Auth::guard('customer')->id();
        $customer = Customer::find($customer_id);

        $banks = ModelsBank::where("customer_id", $customer_id)->get();

        $context = [
            'customer' => $customer,
            'banks' => $banks
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

    public function bank_add_post (Request $request) {

        $customer_id = Auth::guard('customer')->id();
        $customer = Customer::find($customer_id);

        if (ModelsBank::where("customer_id", $customer_id)->where('bank_name', '=', $request->bank_name)->exists()) {
            return Redirect::back()->withErrors(['msg' => 'Bank account that you chose is already created!']);
        }
        else {
            ModelsBank::create([
                'customer_id' => $customer_id,
                'bank_name' => $request->bank_name,
                'account_name' => $request->account_name,
                'account_number' => $request->account_number,
                'phone_number' => $request->phone_number
            ]);
        }
        
        $context = [
            'customer' => $customer
        ];

        return redirect()->route('bank')->with('success', 'Bank Account Added Successfully');
    }
}
