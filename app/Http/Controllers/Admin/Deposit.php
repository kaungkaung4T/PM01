<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Deposit as ModelsDeposit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Deposit extends Controller
{
    /**
     * Generate an unique reference number.
     */
    public function generate_reference_number () {

        $number = mt_rand(100000000000000000, 999999999999999999);
  
        if ($this->barcodeNumberExists($number)) {
            return $this->generate_reference_number();
        }
  
        return $number;
        }
  
      /**
       * Check reference number is duplicate or not.
       */
      public function barcodeNumberExists($number) {
          return ModelsDeposit::where("code", "=", $number)->exists();
      } 

    public function deposit (Request $request) {
        $all_deposit = ModelsDeposit::orderBy('id', 'DESC')->get();

        $context = [
            "all_deposit" => $all_deposit
        ];
        return view('admin.deposit.deposit', $context);
    }

    public function create_deposit (Request $request) {

        $reference_number = $this->generate_reference_number();
        
        $all_deposit = ModelsDeposit::create([
            'customer_id' => $request->userid,
            'customer_name' => $request->username,
            'code' => $reference_number,
            'amount' => $request->amount,
            'remark' => $request->remark,
            'wallet' => $request->wallet,
            'system_user' => Auth::id(),
            'status' => 'Completed'
        ]);

        $customer = Customer::find($request->userid);
        $customer->update([
            'deposit_amount' => $all_deposit->id
        ]);

        $context = [
            "all_deposit" => $all_deposit
        ];
        return redirect()->route('admin.customer')->with('success', 'Deposit Created Successfully');
    }
}
