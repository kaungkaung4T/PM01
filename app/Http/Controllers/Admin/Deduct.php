<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Deposit;
use App\Models\DepositNoti;
use App\Models\Withdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class Deduct extends Controller
{
    /**
     * Generate an unique reference number.
     */
    public function generate_reference_number () {

        // $number = mt_rand(100000000000000000, 999999999999999999);
        // $number = mt_rand(100000000000000000, PHP_INT_MAX);
        $number = mt_rand(10000000, 99999999);
  
        if ($this->barcodeNumberExists($number)) {
            return $this->generate_reference_number();
        }
  
        return $number;
        }
  
    /**
     * Check reference number is duplicate or not.
     */
    public function barcodeNumberExists($number) {
        return Withdrawal::where("code", "=", $number)->exists();
    }

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

        $reference_number = $this->generate_reference_number();

        if ($request->wallet == "wallet_1") {
            $all_deposit = Deposit::where("id", $customer->deposit_amount)->first();
            $old_amount = $all_deposit->wallet;
            $new_amount = $request->amount;

            if ($new_amount > $old_amount) {
                return Redirect::back()->withErrors(['msg' => 'Deduct amounts can not be greateer than existing amount!']);
            }

            $minus = $old_amount - $new_amount;

            $all_deposit ->update([
                'amount' => $minus,
                'wallet' => $minus
            ]);

            // Deposit Noti
            DepositNoti::where("customer_id", $customer->deposit_amount)->where('wallet', '=', $request->wallet)->update([
                'amount' => $minus,
                'wallet1' => $minus
            ]);

            $all_withdrawal = Withdrawal::create([
                'customer_id' => $request->userid,
                'customer_name' => $request->username,
                'code' => $reference_number,
                'amount' => $request->amount,
                'remark' => $request->remark,
                'system_user' => Auth::id(),
                'status' => 'Completed',
                'complete_date' => date('Y-m-d H:i:s'),
                'reject_date' => null,
                'completed_rejected_user' => Auth::id(),
            ]);
        }
        if ($request->wallet == "wallet_2") {
            $all_deposit = Deposit::where("id", $customer->deposit_amount)->first();
            $old_amount = $all_deposit->wallet2;
            $new_amount = $request->amount;

            if ($new_amount > $old_amount) {
                return Redirect::back()->withErrors(['msg' => 'Deduct amounts can not be greateer than existing amount!']);
            }
            
            $minus = $old_amount - $new_amount;

            $all_deposit ->update([
                'amount' => $minus,
                'wallet2' => $minus
            ]);

            // Deposit Noti
            DepositNoti::where("customer_id", $customer->deposit_amount)->where('wallet', '=', $request->wallet)->update([
                'amount' => $minus,
                'wallet2' => $minus
            ]);

            $all_withdrawal = Withdrawal::create([
                'customer_id' => $request->userid,
                'customer_name' => $request->username,
                'code' => $reference_number,
                'amount' => $request->amount,
                'remark' => $request->remark,
                'system_user' => Auth::id(),
                'status' => 'Completed',
                'complete_date' => date('Y-m-d H:i:s'),
                'reject_date' => null,
                'completed_rejected_user' => Auth::id(),
            ]);
        }
        if ($request->wallet == "wallet_3") {
            $all_deposit = Deposit::where("id", $customer->deposit_amount)->first();
            $old_amount = $all_deposit->wallet3;
            $new_amount = $request->amount;

            if ($new_amount > $old_amount) {
                return Redirect::back()->withErrors(['msg' => 'Deduct amounts can not be greateer than existing amount!']);
            }
            
            $minus = $old_amount - $new_amount;

            $all_deposit ->update([
                'amount' => $minus,
                'wallet3' => $minus
            ]);

            // Deposit Noti
            DepositNoti::where("customer_id", $customer->deposit_amount)->where('wallet', '=', $request->wallet)->update([
                'amount' => $minus,
                'wallet3' => $minus
            ]);

            $all_withdrawal = Withdrawal::create([
                'customer_id' => $request->userid,
                'customer_name' => $request->username,
                'code' => $reference_number,
                'amount' => $request->amount,
                'remark' => $request->remark,
                'system_user' => Auth::id(),
                'status' => 'Completed',
                'complete_date' => date('Y-m-d H:i:s'),
                'reject_date' => null,
                'completed_rejected_user' => Auth::id(),
            ]);
        }

        $context = [
            "all_deposit" => $all_deposit
        ];
        return redirect()->route('admin.customer')->with('success', 'Deduct Created Successfully');
    }
}
