<?php

namespace App\Http\Controllers\FrontEnd\Financial;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Deposit;
use App\Models\Withdrawal as ModelsWithdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class Withdrawal extends Controller
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
        return ModelsWithdrawal::where("code", "=", $number)->exists();
    }

    public function customer_withdrawal (Request $request) {

        $customer_id = Auth::guard('customer')->id();
        $customer = Customer::find($customer_id);

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
            
            $all_withdrawal = ModelsWithdrawal::create([
                'customer_id' => $customer_id,
                'customer_name' => $customer->username,
                'code' => $reference_number,
                'amount' => $request->amount,
                'remark' => $request->wallet,
                'wallet' => $request->wallet,
                'wallet1' => $request->amount,
                'status' => 'Pending',
                'complete_date' => null,
                'reject_date' => null,
            ]);
        }
        if ($request->wallet == "wallet_2") {
            $all_deposit = Deposit::where("id", $customer->deposit_amount)->first();
            $old_amount = $all_deposit->wallet2;
            $new_amount = $request->amount;

            if ($new_amount > $old_amount) {
                return Redirect::back()->withErrors(['msg' => 'Deduct amounts can not be greateer than existing amount!']);
            }

            $all_withdrawal = ModelsWithdrawal::create([
                'customer_id' => $customer_id,
                'customer_name' => $customer->username,
                'code' => $reference_number,
                'amount' => $request->amount,
                'remark' => $request->wallet,
                'wallet' => $request->wallet,
                'wallet2' => $request->amount,
                'status' => 'Pending',
                'complete_date' => null,
                'reject_date' => null,
            ]);
        }
        if ($request->wallet == "wallet_3") {
            $all_deposit = Deposit::where("id", $customer->deposit_amount)->first();
            $old_amount = $all_deposit->wallet3;
            $new_amount = $request->amount;

            if ($new_amount > $old_amount) {
                return Redirect::back()->withErrors(['msg' => 'Deduct amounts can not be greateer than existing amount!']);
            }

            $all_withdrawal = ModelsWithdrawal::create([
                'customer_id' => $customer_id,
                'customer_name' => $customer->username,
                'code' => $reference_number,
                'amount' => $request->amount,
                'remark' => $request->wallet,
                'wallet' => $request->wallet,
                'wallet3' => $request->amount,
                'status' => 'Pending',
                'complete_date' => null,
                'reject_date' => null,
            ]);
        }
        return redirect()->back()->with('message', 'Withdrawal amount successfully placed with pending!');
    }
}
