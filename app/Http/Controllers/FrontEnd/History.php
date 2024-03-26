<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\DepositResult;
use App\Models\Withdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class History extends Controller
{
    public function history_deposit (Request $request) {

        $customer_id = Auth::guard('customer')->id();
        $customer = Customer::find($customer_id);

        $all_deposit = DepositResult::orderBy('id', 'DESC')->get();

        $context = [
            'customer' => $customer,
            "all_deposit" => $all_deposit
        ];

        return view('front_end.history_deposit', $context);
    }

    public function history_withdrawal (Request $request) {

        $customer_id = Auth::guard('customer')->id();
        $customer = Customer::find($customer_id);

        $all_withdrawal = Withdrawal::orderBy('id', 'DESC')->get();

        $context = [
            'customer' => $customer,
            "all_withdrawal" => $all_withdrawal
        ];

        return view('front_end.history_withdrawal', $context);
    }
}
