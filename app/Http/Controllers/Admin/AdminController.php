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

                // ------------- Group By All Months -------------
        // $month_users = User::select('id', 'created_at')
        //                 ->get()
        //                 ->groupBy(function($date) {
        //                     return Carbon::parse($date->created_at)->format('m'); // grouping by months
        //                 });
        
        $deposit_amount = Deposit::all();
        $today_deposit_amount = Deposit::whereDate('created_at', date('Y-m-d'))->get();
        $month_deposit_amount = Deposit::where('created_at', '>=', Carbon::now()->subDays(30)->toDateTimeString())->get();
        $pending_deposit_amount = Deposit::all();

        $all_deposit_amount_total = 0;
        $today_deposit_amount_total = 0;
        $month_deposit_amount_total = 0;
        $pending_deposit_amount_total = 0;
        
        for($i = 0; $i < $deposit_amount->count() ; $i++) {
            if ( $deposit_amount[$i]->status == 'Completed' ) {
                $all_deposit_amount_total = $deposit_amount[$i]->amount + $all_deposit_amount_total;
            }
        }
        for($i = 0; $i < $today_deposit_amount->count() ; $i++) {
            if ( $today_deposit_amount[$i]->status == 'Completed' ) {
                $today_deposit_amount_total = $today_deposit_amount[$i]->amount + $today_deposit_amount_total;
            }
        }
        for($i = 0; $i < $month_deposit_amount->count() ; $i++) {
            if ( $month_deposit_amount[$i]->status == 'Completed' ) {
                $month_deposit_amount_total = $month_deposit_amount[$i]->amount + $month_deposit_amount_total;
            }
        }
        for($i = 0; $i < $pending_deposit_amount->count() ; $i++) {
            if ( $pending_deposit_amount[$i]->status == 'Pending' ) {
                $pending_deposit_amount_total = $pending_deposit_amount[$i]->amount + $pending_deposit_amount_total;
            }
        }

        $withdrawal_amount = Withdrawal::all();
        $today_withdrawal_amount = Withdrawal::whereDate('created_at', date('Y-m-d'))->get();
        $month_withdrawal_amount = Withdrawal::where('created_at', '>=', Carbon::now()->subDays(30)->toDateTimeString())->get();
        $pending_withdrawal_amount = Withdrawal::all();

        $all_withdrawal_amount_total = 0;
        $today_withdrawal_amount_total = 0;
        $month_withdrawal_amount_total = 0;
        $pending_withdrawal_amount_total = 0;
        
        for($i = 0; $i < $withdrawal_amount->count() ; $i++) {
            if ( $withdrawal_amount[$i]->status == 'Completed' ) {
                $all_withdrawal_amount_total = $withdrawal_amount[$i]->amount + $all_withdrawal_amount_total;
            }
        }
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
        for($i = 0; $i < $pending_withdrawal_amount->count() ; $i++) {
            if ( $pending_withdrawal_amount[$i]->status == 'Pending' ) {
                $pending_withdrawal_amount_total = $pending_withdrawal_amount[$i]->amount + $pending_withdrawal_amount_total;
            }
        }

        $system_profit = $all_deposit_amount_total - $all_withdrawal_amount_total;
        $today_profit = $today_deposit_amount_total - $today_withdrawal_amount_total;

        $context = [
            'today_user'=> $today_user->count(),
            'month_users'=> $month_users->count(),

            'today_deposit'=> $today_deposit->count(),
            'month_deposit'=> $month_deposit->count(),

            'today_deposit_amount_total'=> $today_deposit_amount_total,
            'month_deposit_amount_total'=> $month_deposit_amount_total,
            'pending_deposit_amount_total'=> $pending_deposit_amount_total,

            'system_profit'=> $system_profit,
            'today_profit'=> $today_profit,
            'today_withdrawal_amount_total'=> $today_withdrawal_amount_total,
            'month_withdrawal_amount_total'=> $month_withdrawal_amount_total,
            'pending_withdrawal_amount_total'=> $pending_withdrawal_amount_total
        ];
        return view('admin.index', $context);
    }

    public function admin_search (Request $request) {
        $dates = $request->dates;
        $modify_dates = (explode("-", $dates));
        $f = $modify_dates[0];
        $t = $modify_dates[1];

        $modify_f = (explode("/", $f));
        $modify_t = (explode("/", $t));

        $modify_f_2 = preg_replace('/\s+/', '', $modify_f[2]);
        $modify_f_0 = preg_replace('/\s+/', '', $modify_f[0]);
        $modify_f_1 = preg_replace('/\s+/', '', $modify_f[1]);

        $modify_t_2 = preg_replace('/\s+/', '', $modify_t[2]);
        $modify_t_0 = preg_replace('/\s+/', '', $modify_t[0]);
        $modify_t_1 = preg_replace('/\s+/', '', $modify_t[1]);

        $modify_from = "$modify_f_2-$modify_f_0-$modify_f_1";
        $modify_to = "$modify_t_2-$modify_t_0-$modify_t_1";


        $from = date('2024-02-01');
        $to = date('2024-02-25');
        $search_deposit_amount = Deposit::whereBetween('created_at', [$modify_from, $modify_to])->get();
        $search_withdrawal_amount = Withdrawal::whereBetween('created_at', [$modify_from, $modify_to])->get();

        $context = [
            "dates"=> $dates,

            "search_deposit_amount"=> $search_deposit_amount,
            "search_withdrawal_amount"=> $search_withdrawal_amount,

            "f"=> $modify_from,
            "s"=> $modify_to,
        ];
        return view('admin.search.search', $context);
    }

    public function admin_mobile_search (Request $request) {
        $dates = $request->dates2;
        $modify_dates = (explode("-", $dates));
        $f = $modify_dates[0];
        $t = $modify_dates[1];

        $modify_f = (explode("/", $f));
        $modify_t = (explode("/", $t));

        $modify_f_2 = preg_replace('/\s+/', '', $modify_f[2]);
        $modify_f_0 = preg_replace('/\s+/', '', $modify_f[0]);
        $modify_f_1 = preg_replace('/\s+/', '', $modify_f[1]);

        $modify_t_2 = preg_replace('/\s+/', '', $modify_t[2]);
        $modify_t_0 = preg_replace('/\s+/', '', $modify_t[0]);
        $modify_t_1 = preg_replace('/\s+/', '', $modify_t[1]);

        $modify_from = "$modify_f_2-$modify_f_0-$modify_f_1";
        $modify_to = "$modify_t_2-$modify_t_0-$modify_t_1";


        $from = date('2024-02-01');
        $to = date('2024-02-25');
        $search_deposit_amount = Deposit::whereBetween('created_at', [$modify_from, $modify_to])->get();
        $search_withdrawal_amount = Withdrawal::whereBetween('created_at', [$modify_from, $modify_to])->get();

        $context = [
            "dates"=> $dates,

            "search_deposit_amount"=> $search_deposit_amount,
            "search_withdrawal_amount"=> $search_withdrawal_amount,

            "f"=> $modify_from,
            "s"=> $modify_to,
        ];
        return view('admin.search.search', $context);
    }
}
