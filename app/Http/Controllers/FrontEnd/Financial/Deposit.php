<?php

namespace App\Http\Controllers\FrontEnd\Financial;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\DepositResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Deposit extends Controller
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
        return DepositResult::where("code", "=", $number)->exists();
    } 

    public function customer_deposit (Request $request) {

        $reference_number = $this->generate_reference_number();

        $customer_id = Auth::guard('customer')->id();
        $customer = Customer::find($customer_id);

        if ($request->wallet == "wallet_1") {
            $all_deposit = DepositResult::create([
                'customer_id' => $customer_id,
                'customer_name' => $customer->username,
                'code' => $reference_number,
                'amount' => $request->amount,
                'remark' => $request->wallet,
                'wallet' => $request->wallet,
                'wallet1' => $request->amount,
                'status' => 'Pending'
            ]);
        }else if ($request->wallet == "wallet_2") {
            $all_deposit = DepositResult::create([
                'customer_id' => $customer_id,
                'customer_name' => $customer->username,
                'code' => $reference_number,
                'amount' => $request->amount,
                'remark' => $request->wallet,
                'wallet' => $request->wallet,
                'wallet2' => $request->amount,
                'status' => 'Pending'
            ]);
        }else if ($request->wallet == "wallet_3") {
            $all_deposit = DepositResult::create([
                'customer_id' => $customer_id,
                'customer_name' => $customer->username,
                'code' => $reference_number,
                'amount' => $request->amount,
                'remark' => $request->wallet,
                'wallet' => $request->wallet,
                'wallet3' => $request->amount,
                'status' => 'Pending'
            ]);
        }
        return redirect()->back()->with('message', 'Deposit amount successfully placed with pending!');
    }
}
