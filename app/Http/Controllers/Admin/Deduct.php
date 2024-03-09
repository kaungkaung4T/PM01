<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Deposit;
use App\Models\DepositNoti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class Deduct extends Controller
{
    public function deduct (Request $request, $id) {

        $customer = Customer::find($id);

        if (is_null(Deposit::where("id", $customer->deposit_amount)->first())) {
            return Redirect::back()->withErrors(['msg' => 'Please create your deposit first before deduct!']);
        }

        $all_deposit = Deposit::find($customer->deposit_amount);

        if ($request->wallet == "wallet_1") {
            $all_deposit ->update([
                'amount' => $request->amount,
                'wallet' => $request->amount
            ]);

            // Deposit Noti
            DepositNoti::where("customer_id", $customer->deposit_amount)->where('wallet', '=', $request->wallet)->update([
                'amount' => $request->amount,
                'wallet1' => $request->amount
            ]);
        }
        if ($request->wallet == "wallet_2") {
            $all_deposit ->update([
                'amount' => $request->amount,
                'wallet2' => $request->amount
            ]);

            // Deposit Noti
            DepositNoti::where("customer_id", $customer->deposit_amount)->where('wallet', '=', $request->wallet)->update([
                'amount' => $request->amount,
                'wallet2' => $request->amount
            ]);
        }
        if ($request->wallet == "wallet_3") {
            $all_deposit ->update([
                'amount' => $request->amount,
                'wallet3' => $request->amount
            ]);

            // Deposit Noti
            DepositNoti::where("customer_id", $customer->deposit_amount)->where('wallet', '=', $request->wallet)->update([
                'amount' => $request->amount,
                'wallet3' => $request->amount
            ]);
        }

        $context = [
            "all_deposit" => $all_deposit
        ];
        return redirect()->route('admin.customer')->with('success', 'Deduct Created Successfully');
    }
}
