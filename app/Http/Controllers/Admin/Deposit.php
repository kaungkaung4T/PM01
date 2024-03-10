<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Deposit as ModelsDeposit;
use App\Models\DepositNoti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Deposit extends Controller
{
    /**
     * Generate an unique reference number.
     */
    public function generate_reference_number () {

        // $number = mt_rand(100000000000000000, 999999999999999999);
        $number = mt_rand(100000000000000000, PHP_INT_MAX);
  
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
        $all_deposit = DepositNoti::orderBy('id', 'DESC')->get();

        $context = [
            "all_deposit" => $all_deposit
        ];
        return view('admin.deposit.deposit', $context);
    }

    public function create_deposit (Request $request) {

        $reference_number = $this->generate_reference_number();
        
        if (ModelsDeposit::where("customer_id", $request->userid)->exists()) {
            if ($request->wallet == "wallet_1") {
                $md = ModelsDeposit::where("customer_id", $request->userid)->first();
                $old_amount = $md->wallet;
                $new_amount = $request->amount;
                $plus_amount = $old_amount + $new_amount;

                ModelsDeposit::where("customer_id", $request->userid)->update([
                    'customer_id' => $request->userid,
                    'customer_name' => $request->username,
                    'code' => $reference_number,
                    'amount' => $plus_amount,
                    'remark' => $request->remark,
                    'wallet' => $plus_amount,
                    'system_user' => Auth::id(),
                    'status' => 'Completed'
                ]);
            }if ($request->wallet == "wallet_2") {
                $md = ModelsDeposit::where("customer_id", $request->userid)->first();
                $old_amount = $md->wallet2;
                $new_amount = $request->amount;
                $plus_amount = $old_amount + $new_amount;

                ModelsDeposit::where("customer_id", $request->userid)->update([
                    'customer_id' => $request->userid,
                    'customer_name' => $request->username,
                    'code' => $reference_number,
                    'amount' => $plus_amount,
                    'remark' => $request->remark,
                    'wallet2' => $plus_amount,
                    'system_user' => Auth::id(),
                    'status' => 'Completed'
                ]);
            }if ($request->wallet == "wallet_3") {
                $md = ModelsDeposit::where("customer_id", $request->userid)->first();
                $old_amount = $md->wallet3;
                $new_amount = $request->amount;
                $plus_amount = $old_amount + $new_amount;

                ModelsDeposit::where("customer_id", $request->userid)->update([
                    'customer_id' => $request->userid,
                    'customer_name' => $request->username,
                    'code' => $reference_number,
                    'amount' => $plus_amount,
                    'remark' => $request->remark,
                    'wallet3' => $plus_amount,
                    'system_user' => Auth::id(),
                    'status' => 'Completed'
                ]);
            }
        }
        else {
            if ($request->wallet == "wallet_1") {
                $all_deposit = ModelsDeposit::create([
                    'customer_id' => $request->userid,
                    'customer_name' => $request->username,
                    'code' => $reference_number,
                    'amount' => $request->amount,
                    'remark' => $request->remark,
                    'wallet' => $request->amount,
                    'system_user' => Auth::id(),
                    'status' => 'Completed'
                ]);
            }else if ($request->wallet == "wallet_2") {
                $all_deposit = ModelsDeposit::create([
                    'customer_id' => $request->userid,
                    'customer_name' => $request->username,
                    'code' => $reference_number,
                    'amount' => $request->amount,
                    'remark' => $request->remark,
                    'wallet2' => $request->amount,
                    'system_user' => Auth::id(),
                    'status' => 'Completed'
                ]);
            }else if ($request->wallet == "wallet_3") {
                $all_deposit = ModelsDeposit::create([
                    'customer_id' => $request->userid,
                    'customer_name' => $request->username,
                    'code' => $reference_number,
                    'amount' => $request->amount,
                    'remark' => $request->remark,
                    'wallet3' => $request->amount,
                    'system_user' => Auth::id(),
                    'status' => 'Completed'
                ]);
            }

            $customer = Customer::find($request->userid);
            $customer->update([
                'deposit_amount' => $all_deposit->id
            ]);
        }


            // Deposit Noti For Display in Deposit Page
            if (DepositNoti::where("customer_id", $request->userid)->where('wallet', '=', $request->wallet)->exists()) {
                if ($request->wallet == "wallet_1") {
                    $md = DepositNoti::where("customer_id", $request->userid)->where('wallet', '=', $request->wallet)->first();
                    $old_amount = $md->wallet1;
                    $new_amount = $request->amount;
                    $plus_amount = $old_amount + $new_amount;

                    $all_deposit = DepositNoti::where("customer_id", $request->userid)->where('wallet', '=', $request->wallet)->update([
                        'customer_id' => $request->userid,
                        'customer_name' => $request->username,
                        'code' => $reference_number,
                        'amount' => $plus_amount,
                        'remark' => $request->remark,
                        'wallet' => $request->wallet,
                        'wallet1' => $plus_amount,
                        'system_user' => Auth::id(),
                        'status' => 'Completed'
                    ]);
                }if ($request->wallet == "wallet_2") {
                    $md = DepositNoti::where("customer_id", $request->userid)->where('wallet', '=', $request->wallet)->first();
                    $old_amount = $md->wallet2;
                    $new_amount = $request->amount;
                    $plus_amount = $old_amount + $new_amount;

                    $all_deposit = DepositNoti::where("customer_id", $request->userid)->where('wallet', '=', $request->wallet)->update([
                        'customer_id' => $request->userid,
                        'customer_name' => $request->username,
                        'code' => $reference_number,
                        'amount' => $plus_amount,
                        'remark' => $request->remark,
                        'wallet' => $request->wallet,
                        'wallet2' => $plus_amount,
                        'system_user' => Auth::id(),
                        'status' => 'Completed'
                    ]);
                }if ($request->wallet == "wallet_3") {
                    $md = DepositNoti::where("customer_id", $request->userid)->where('wallet', '=', $request->wallet)->first();
                    $old_amount = $md->wallet3;
                    $new_amount = $request->amount;
                    $plus_amount = $old_amount + $new_amount;

                    $all_deposit = DepositNoti::where("customer_id", $request->userid)->where('wallet', '=', $request->wallet)->update([
                        'customer_id' => $request->userid,
                        'customer_name' => $request->username,
                        'code' => $reference_number,
                        'amount' => $plus_amount,
                        'remark' => $request->remark,
                        'wallet' => $request->wallet,
                        'wallet3' => $plus_amount,
                        'system_user' => Auth::id(),
                        'status' => 'Completed'
                    ]);
                }
            }
            else {
                if ($request->wallet == "wallet_1") {
                    $all_deposit = DepositNoti::create([
                        'customer_id' => $request->userid,
                        'customer_name' => $request->username,
                        'code' => $reference_number,
                        'amount' => $request->amount,
                        'remark' => $request->remark,
                        'wallet' => $request->wallet,
                        'wallet1' => $request->amount,
                        'system_user' => Auth::id(),
                        'status' => 'Completed'
                    ]);
                }else if ($request->wallet == "wallet_2") {
                    $all_deposit = DepositNoti::create([
                        'customer_id' => $request->userid,
                        'customer_name' => $request->username,
                        'code' => $reference_number,
                        'amount' => $request->amount,
                        'remark' => $request->remark,
                        'wallet' => $request->wallet,
                        'wallet2' => $request->amount,
                        'system_user' => Auth::id(),
                        'status' => 'Completed'
                    ]);
                }else if ($request->wallet == "wallet_3") {
                    $all_deposit = DepositNoti::create([
                        'customer_id' => $request->userid,
                        'customer_name' => $request->username,
                        'code' => $reference_number,
                        'amount' => $request->amount,
                        'remark' => $request->remark,
                        'wallet' => $request->wallet,
                        'wallet3' => $request->amount,
                        'system_user' => Auth::id(),
                        'status' => 'Completed'
                    ]);
                }
            }

        $context = [
            "all_deposit" => $all_deposit
        ];
        return redirect()->route('admin.customer')->with('success', 'Deposit Created Successfully');
    }
}
