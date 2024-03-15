<?php

namespace App\Console;

use App\Models\Customer;
use App\Models\Deposit;
use App\Models\DepositNoti;
use App\Models\Subscriptions;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];
    
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
        
        $schedule->call(function () {

            // $all_cus = Customer::all();
            // foreach ($all_cus as $each_cus) {
            //     $all_sub = Subscriptions::where("customer", $all_cus->id);
            // }

            $all_sub = Subscriptions::all();
            foreach ($all_sub as $each_sub) {
                if ($each_sub->status == "Active") {
                    if ($each_sub->reward_wallet_1) {
                        $md = Deposit::where("customer_id", $each_sub->customer)->first();
                        $old_amount = $md->wallet;
                        $new_amount = $each_sub->package_data->reward_amount;
                        $plus_amount = $old_amount + $new_amount;
        
                        Deposit::where("customer_id", $each_sub->customer)->update([
                            'amount' => $plus_amount,
                            'wallet' => $plus_amount
                        ]);
        
                        $md = DepositNoti::where("customer_id", $each_sub->customer)->where('wallet', '=', 'wallet_1')->first();
                        $old_amount = $md->wallet1;
                        $new_amount = $each_sub->package_data->reward_amount;
                        $plus_amount = $old_amount + $new_amount;
        
                        $all_deposit = DepositNoti::where("customer_id", $each_sub->customer)->where('wallet', '=', 'wallet_1')->update([
                            'amount' => $plus_amount,
                            'wallet1' => $plus_amount,
                        ]);
                    }

                    if ($each_sub->reward_wallet_2) {
                        $md = Deposit::where("customer_id", $each_sub->customer)->first();
                        $old_amount = $md->wallet2;
                        $new_amount = $each_sub->package_data->reward_amount;
                        $plus_amount = $old_amount + $new_amount;
        
                        Deposit::where("customer_id", $each_sub->customer)->update([
                            'amount' => $plus_amount,
                            'wallet2' => $plus_amount
                        ]);
        
                        $md = DepositNoti::where("customer_id", $each_sub->customer)->where('wallet', '=', 'wallet_2')->first();
                        $old_amount = $md->wallet2;
                        $new_amount = $each_sub->package_data->reward_amount;
                        $plus_amount = $old_amount + $new_amount;
        
                        $all_deposit = DepositNoti::where("customer_id", $each_sub->customer)->where('wallet', '=', 'wallet_2')->update([
                            'amount' => $plus_amount,
                            'wallet2' => $plus_amount,
                        ]);
                    }
                    
                    if ($each_sub->reward_wallet_3) {
                        $md = Deposit::where("customer_id", $each_sub->customer)->first();
                        $old_amount = $md->wallet3;
                        $new_amount = $each_sub->package_data->reward_amount;
                        $plus_amount = $old_amount + $new_amount;
        
                        Deposit::where("customer_id", $each_sub->customer)->update([
                            'amount' => $plus_amount,
                            'wallet3' => $plus_amount
                        ]);
        
                        $md = DepositNoti::where("customer_id", $each_sub->customer)->where('wallet', '=', 'wallet_3')->first();
                        $old_amount = $md->wallet3;
                        $new_amount = $each_sub->package_data->reward_amount;
                        $plus_amount = $old_amount + $new_amount;
        
                        $all_deposit = DepositNoti::where("customer_id", $each_sub->customer)->where('wallet', '=', 'wallet_3')->update([
                            'amount' => $plus_amount,
                            'wallet3' => $plus_amount,
                        ]);
                    }
                }
            }
        })->dailyAt('22:43')->timezone('Asia/Rangoon');

        $schedule->call(function () {
            $all_sub = Subscriptions::all();
            foreach ($all_sub as $each_sub) {
                if ($each_sub->status == "Active") {
                    
                    $today = Carbon::now();
                    
                    if ($today === $each_sub->end_at) {
                        $each_sub->status = "Inactive";
                        $each_sub->save();
                    }
                }
            }
        })->everyMinute();

    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
