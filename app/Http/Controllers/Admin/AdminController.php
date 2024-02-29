<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Deposit;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function admin_dashboard (Request $request) {
        
        $today_user = Customer::whereDate('created_at', date('Y-m-d'))->get();
        $month_users = Customer::where('created_at', '>=', Carbon::now()->subDays(30)->toDateTimeString())->get();

        $today_deposit = Deposit::whereDate('created_at', date('Y-m-d'))->get();
        $month_deposit = Deposit::where('created_at', '>=', Carbon::now()->subDays(30)->toDateTimeString())->get();

        $today_deposit_amount = Deposit::whereDate('created_at', date('Y-m-d'))->get();
        $month_deposit_amount = Deposit::where('created_at', '>=', Carbon::now()->subDays(30)->toDateTimeString())->get();

        $today_deposit_amount_total = 0;
        $month_deposit_amount_total = 0;
        
        for($i = 0; $i < $today_deposit_amount->count() ; $i++) {
            $today_deposit_amount_total = $today_deposit_amount[$i]->amount + $today_deposit_amount_total;
        }
        for($i = 0; $i < $month_deposit_amount->count() ; $i++) {
            $month_deposit_amount_total = $month_deposit_amount[$i]->amount + $month_deposit_amount_total;
        }

        // ------------- Group By All Months -------------
        // $month_users = User::select('id', 'created_at')
        //                 ->get()
        //                 ->groupBy(function($date) {
        //                     return Carbon::parse($date->created_at)->format('m'); // grouping by months
        //                 });

        $context = [
            'today_user'=> $today_user->count(),
            'month_users'=> $month_users->count(),

            'today_deposit'=> $today_deposit->count(),
            'month_deposit'=> $month_deposit->count(),

            'today_deposit_amount_total'=> $today_deposit_amount_total,
            'month_deposit_amount_total'=> $month_deposit_amount_total
        ];
        return view('admin.index', $context);
    }

    public function admin_setting (Request $request, $id) {
        $each_user = User::find($id);
        
        $context = [
            'each_user' => $each_user
        ];
        return view('admin.setting', $context);
    }

    public function update_admin_name (Request $request, $id) {
        $each_user = User::find($id);
        
        $each_user->update([
            'username' => $request->username
        ]);
        $context = [
            'each_user' => $each_user
        ];
        return redirect()->route('admin.setting', $id)->with('success', 'Name Updated Successfully');
    }

    public function update_admin_password (Request $request, $id) {
        $each_user = User::find($id);
        
        $each_user->update([
            'password' => $request->password
        ]);
        $context = [
            'each_user' => $each_user
        ];
        return redirect()->route('admin.setting', $id)->with('success', 'Password Updated Successfully');
    }
}
