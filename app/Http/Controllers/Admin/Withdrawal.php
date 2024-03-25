<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\DepositNoti;
use App\Models\Withdrawal as ModelsWithdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class Withdrawal extends Controller
{
    public function withdrawal (Request $request) {
        $all_withdrawal = ModelsWithdrawal::orderBy('id', 'DESC')->get();

        $context = [
            "all_withdrawal" => $all_withdrawal
        ];
        return view('admin.withdrawal.withdrawal', $context);
    }

    public function update_withdrawal (Request $request, $id) {
        $withdrawal = ModelsWithdrawal::find($id);
        
        if (isset($request->completed)) {
            if ($withdrawal->wallet == "wallet_1") {
                $all_deposit = Deposit::where("id", $withdrawal->customer_id)->first();
                $old_amount = $all_deposit->wallet;
                $new_amount = $withdrawal->wallet1;
    
                if ($new_amount > $old_amount) {
                    return Redirect::back()->withErrors(['msg' => 'Deduct amounts can not be greateer than existing amount!']);
                }
    
                $minus = $old_amount - $new_amount;
    
                $all_deposit ->update([
                    'amount' => $minus,
                    'wallet' => $minus
                ]);
    
                // Deposit Noti
                DepositNoti::where("customer_id", $withdrawal->customer_id)->where('wallet', '=', $withdrawal->wallet)->update([
                    'amount' => $minus,
                    'wallet1' => $minus
                ]);
            }

            if ($withdrawal->wallet == "wallet_2") {
                $all_deposit = Deposit::where("id", $withdrawal->customer_id)->first();
                $old_amount = $all_deposit->wallet2;
                $new_amount = $withdrawal->wallet2;
    
                if ($new_amount > $old_amount) {
                    return Redirect::back()->withErrors(['msg' => 'Deduct amounts can not be greateer than existing amount!']);
                }
    
                $minus = $old_amount - $new_amount;
    
                $all_deposit ->update([
                    'amount' => $minus,
                    'wallet2' => $minus
                ]);
    
                // Deposit Noti
                DepositNoti::where("customer_id", $withdrawal->customer_id)->where('wallet', '=', $withdrawal->wallet)->update([
                    'amount' => $minus,
                    'wallet2' => $minus
                ]);
            }

            if ($withdrawal->wallet == "wallet_3") {
                $all_deposit = Deposit::where("id", $withdrawal->customer_id)->first();
                $old_amount = $all_deposit->wallet3;
                $new_amount = $withdrawal->wallet3;
    
                if ($new_amount > $old_amount) {
                    return Redirect::back()->withErrors(['msg' => 'Deduct amounts can not be greateer than existing amount!']);
                }
    
                $minus = $old_amount - $new_amount;
    
                $all_deposit ->update([
                    'amount' => $minus,
                    'wallet3' => $minus
                ]);
    
                // Deposit Noti
                DepositNoti::where("customer_id", $withdrawal->customer_id)->where('wallet', '=', $withdrawal->wallet)->update([
                    'amount' => $minus,
                    'wallet3' => $minus
                ]);
            }

            $withdrawal->completed_rejected_user = Auth::id();
            $withdrawal->status = 'Completed';
            $withdrawal->complete_date = date('Y-m-d H:i:s');
            $withdrawal->reject_date = null;
            $withdrawal->save();
        }

        if (isset($request->rejected)) {
            $withdrawal->completed_rejected_user = Auth::id();
            $withdrawal->status = 'Rejected';
            $withdrawal->complete_date = null;
            $withdrawal->reject_date = date('Y-m-d H:i:s');
            $withdrawal->save();
        }

        $context = [
            "withdrawal" => $withdrawal
        ];
        return redirect()->route('admin.withdrawal')->with('success', 'Withdrawal Updated Successfully');
    }
}
