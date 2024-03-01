<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Deposit;
use App\Models\User;
use App\Models\Withdrawal;
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

        $today_withdrawal_amount = Withdrawal::whereDate('created_at', date('Y-m-d'))->get();
        $month_withdrawal_amount = Withdrawal::where('created_at', '>=', Carbon::now()->subDays(30)->toDateTimeString())->get();

        $today_withdrawal_amount_total = 0;
        $month_withdrawal_amount_total = 0;
        
        for($i = 0; $i < $today_withdrawal_amount->count() ; $i++) {
            if ( $today_withdrawal_amount[$i]->status == 'Completed' ) {
                $today_withdrawal_amount_total = $today_withdrawal_amount[$i]->amount + $today_withdrawal_amount_total;
            }
        }
        for($i = 0; $i < $month_withdrawal_amount->count() ; $i++) {
            if ( $month_withdrawal_amount[$i]->status == 'Completed' ) {
                $month_withdrawal_amount_total = $month_withdrawal_amount[$i]->amount + $month_withdrawal_amount_total;
            }
        }

        $context = [
            'today_user'=> $today_user->count(),
            'month_users'=> $month_users->count(),

            'today_deposit'=> $today_deposit->count(),
            'month_deposit'=> $month_deposit->count(),

            'today_deposit_amount_total'=> $today_deposit_amount_total,
            'month_deposit_amount_total'=> $month_deposit_amount_total,

            'today_withdrawal_amount_total'=> $today_withdrawal_amount_total,
            'month_withdrawal_amount_total'=> $month_withdrawal_amount_total
        ];
        return view('admin.index', $context);
    }
}
