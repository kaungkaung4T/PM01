<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\DepositNoti;
use App\Models\Package;
use App\Models\Subscriptions as ModelsSubscriptions;
use App\Models\Withdrawal;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class Subscriptions extends Controller
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
        return ModelsSubscriptions::where("code", "=", $number)->exists();
    } 

    public function subscriptions (Request $request) {
        $all_subscriptions = ModelsSubscriptions::orderBy('id', 'DESC')->get();

        $context = [
            "all_subscriptions" => $all_subscriptions
        ];
        return view('admin.subscriptions.subscriptions', $context);
    }
    
    public function subscribe (Request $request) {

        $reference_number = $this->generate_reference_number();

        $package = Package::find($request->package);

        $date = Carbon::now();
        $end_date = $date->addDay($package->days);

        if (ModelsSubscriptions::where("customer", $request->userid)->where('wallet', '=', $request->wallet)->exists()) {
            $ms = ModelsSubscriptions::where("customer", $request->userid)->where('wallet', '=', $request->wallet)->first();

            if ($request->wallet == "wallet_1") {
                if ($ms->reward_wallet_1) {
                    return Redirect::back()->withErrors(['msg' => "Package was already Bought with wallet 1!"]);
                }
            }
            if ($request->wallet == "wallet_2") {
                if ($ms->reward_wallet_2) {
                    return Redirect::back()->withErrors(['msg' => "Package was already Bought with wallet 2!"]);
                }
            }
            if ($request->wallet == "wallet_3") {
                if ($ms->reward_wallet_3) {
                    return Redirect::back()->withErrors(['msg' => "Package was already Bought with wallet 3!"]);
                }
            }
        }

        if ($request->wallet == "wallet_1") {
            $md = Deposit::where("customer_id", $request->userid)->first();
            $old_amount = $md->wallet;
            $new_amount = $request->amount;
            $minus_amount = $old_amount - $new_amount;

            if ($new_amount > $old_amount) {
                return Redirect::back()->withErrors(['msg' => 'Not enough deposit amounts!']);
            }

            Deposit::where("customer_id", $request->userid)->update([
                'amount' => $minus_amount,
                'wallet' => $minus_amount,
            ]);

            $md = DepositNoti::where("customer_id", $request->userid)->where('wallet', '=', $request->wallet)->first();
            $old_amount = $md->wallet1;
            $new_amount = $request->amount;
            $minus_amount = $old_amount - $new_amount;

            $all_deposit = DepositNoti::where("customer_id", $request->userid)->where('wallet', '=', $request->wallet)->update([
                'amount' => $minus_amount,
                'wallet1' => $minus_amount,
            ]);

            $ms = ModelsSubscriptions::create([
                'customer' => $request->userid,
                'code' => $reference_number,
                'amount' => $request->amount,
                'package' => $package->id,
                'start_at' => date('Y-m-d H:i:s'),
                'end_at' => $end_date,
                'status' => 'Active',
                'reward_wallet_1' => $package->reward_percent,
                'wallet' => $request->wallet
            ]);

            Withdrawal::create([
                'customer_id' => $request->userid,
                'customer_name' => $request->username,
                'code' => $reference_number,
                'amount' => $request->amount,
                'remark' => $package->name,
                'system_user' => Auth::id(),
                'status' => 'Completed',
                'complete_date' => date('Y-m-d H:i:s'),
                'reject_date' => null,
                'completed_rejected_user' => Auth::id(),
            ]);
        }

        if ($request->wallet == "wallet_2") {
            $md = Deposit::where("customer_id", $request->userid)->first();
            $old_amount = $md->wallet2;
            $new_amount = $request->amount;
            $minus_amount = $old_amount - $new_amount;

            if ($new_amount > $old_amount) {
                return Redirect::back()->withErrors(['msg' => 'Not enough deposit amounts!']);
            }

            Deposit::where("customer_id", $request->userid)->update([
                'amount' => $minus_amount,
                'wallet2' => $minus_amount,
            ]);

            $md = DepositNoti::where("customer_id", $request->userid)->where('wallet', '=', $request->wallet)->first();
            $old_amount = $md->wallet2;
            $new_amount = $request->amount;
            $minus_amount = $old_amount - $new_amount;

            $all_deposit = DepositNoti::where("customer_id", $request->userid)->where('wallet', '=', $request->wallet)->update([
                'amount' => $minus_amount,
                'wallet2' => $minus_amount,
            ]);
            
            ModelsSubscriptions::create([
                'customer' => $request->userid,
                'code' => $reference_number,
                'amount' => $request->amount,
                'package' => $package->id,
                'start_at' => date('Y-m-d H:i:s'),
                'end_at' => $end_date,
                'status' => 'Active',
                'reward_wallet_2' => $package->reward_percent,
                'wallet' => $request->wallet
            ]);

            Withdrawal::create([
                'customer_id' => $request->userid,
                'customer_name' => $request->username,
                'code' => $reference_number,
                'amount' => $request->amount,
                'remark' => $package->name,
                'system_user' => Auth::id(),
                'status' => 'Completed',
                'complete_date' => date('Y-m-d H:i:s'),
                'reject_date' => null,
                'completed_rejected_user' => Auth::id(),
            ]);
        }

        if ($request->wallet == "wallet_3") {
            $md = Deposit::where("customer_id", $request->userid)->first();
            $old_amount = $md->wallet3;
            $new_amount = $request->amount;
            $minus_amount = $old_amount - $new_amount;

            if ($new_amount > $old_amount) {
                return Redirect::back()->withErrors(['msg' => 'Not enough deposit amounts!']);
            }

            Deposit::where("customer_id", $request->userid)->update([
                'amount' => $minus_amount,
                'wallet3' => $minus_amount,
            ]);

            $md = DepositNoti::where("customer_id", $request->userid)->where('wallet', '=', $request->wallet)->first();
            $old_amount = $md->wallet3;
            $new_amount = $request->amount;
            $minus_amount = $old_amount - $new_amount;

            $all_deposit = DepositNoti::where("customer_id", $request->userid)->where('wallet', '=', $request->wallet)->update([
                'amount' => $minus_amount,
                'wallet3' => $minus_amount,
            ]);

            ModelsSubscriptions::create([
                'reward_wallet_3' => $package->reward_percent,
                'customer' => $request->userid,
                'code' => $reference_number,
                'amount' => $request->amount,
                'package' => $package->id,
                'start_at' => date('Y-m-d H:i:s'),
                'end_at' => $end_date,
                'status' => 'Active',
                'reward_wallet_3' => $package->reward_percent,
                'wallet' => $request->wallet
            ]);

            Withdrawal::create([
                'customer_id' => $request->userid,
                'customer_name' => $request->username,
                'code' => $reference_number,
                'amount' => $request->amount,
                'remark' => $package->name,
                'system_user' => Auth::id(),
                'status' => 'Completed',
                'complete_date' => date('Y-m-d H:i:s'),
                'reject_date' => null,
                'completed_rejected_user' => Auth::id(),
            ]);
        }
       

        return redirect()->route('admin.customer')->with('success', 'Package Bought Successfully');
    }
}
