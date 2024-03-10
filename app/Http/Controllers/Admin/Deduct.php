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

        if (is_null($customer->deposit_data)) {
            return Redirect::back()->withErrors(['msg' => 'Please create your deposit first before deduct!']);
        }

        if ($request->wallet == "wallet_1") {
            if (Deposit::where("customer_id", $customer->deposit_amount)) {
                $d = Deposit::find($customer->deposit_data->id);
                if (is_null($d->wallet)) {
                    return Redirect::back()->withErrors(['msg' => 'Please create your deposit wallet 1 first before deduct!']);
                }
            }
            else {
                return Redirect::back()->withErrors(['msg' => 'Please create your deposit wallet 1 first before deduct!']);
            }
        }
        if ($request->wallet == "wallet_2") {
            if (Deposit::where("customer_id", $customer->deposit_amount)) {
                $d = Deposit::find($customer->deposit_data->id);
                if (is_null($d->wallet2)) {
                    return Redirect::back()->withErrors(['msg' => 'Please create your deposit wallet 2 first before deduct!']);
                }
            }
            else {
                return Redirect::back()->withErrors(['msg' => 'Please create your deposit wallet 2 first before deduct!']);
            }
        }
        if ($request->wallet == "wallet_3") {
            if (Deposit::where("customer_id", $customer->deposit_amount)) {
                $d = Deposit::find($customer->deposit_data->id);
                if (is_null($d->wallet3)) {
                    return Redirect::back()->withErrors(['msg' => 'Please create your deposit wallet 3 first before deduct!']);
                }
            }
            else {
                return Redirect::back()->withErrors(['msg' => 'Please create your deposit wallet 3 first before deduct!']);
            }
        }


        $all_deposit = Deposit::find($customer->deposit_amount);
        $old_amount = $all_deposit->wallet;
        $new_amount = $request->amount;

        if ($new_amount > $old_amount) {
            return Redirect::back()->withErrors(['msg' => 'Deduct amounts can not be greateer than existing amount!']);
        }
        $minus = $old_amount - $new_amount;

        if ($request->wallet == "wallet_1") {
            $all_deposit ->update([
                'amount' => $minus,
                'wallet' => $minus
            ]);

            // Deposit Noti
            DepositNoti::where("customer_id", $customer->deposit_amount)->where('wallet', '=', $request->wallet)->update([
                'amount' => $minus,
                'wallet1' => $minus
            ]);
        }
        if ($request->wallet == "wallet_2") {
            $all_deposit ->update([
                'amount' => $minus,
                'wallet2' => $minus
            ]);

            // Deposit Noti
            DepositNoti::where("customer_id", $customer->deposit_amount)->where('wallet', '=', $request->wallet)->update([
                'amount' => $minus,
                'wallet2' => $minus
            ]);
        }
        if ($request->wallet == "wallet_3") {
            $all_deposit ->update([
                'amount' => $minus,
                'wallet3' => $minus
            ]);

            // Deposit Noti
            DepositNoti::where("customer_id", $customer->deposit_amount)->where('wallet', '=', $request->wallet)->update([
                'amount' => $minus,
                'wallet3' => $minus
            ]);
        }

        $context = [
            "all_deposit" => $all_deposit
        ];
        return redirect()->route('admin.customer')->with('success', 'Deduct Created Successfully');
    }
}
