<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\Subscriptions as ModelsSubscriptions;
use Carbon\Carbon;
use Illuminate\Http\Request;

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

        // $today = date('Y-m-d');
        // $end_date = null;

        // for($i =1; $i <= $package->days; $i++){
        //     $end_date = date('Y M,d', strtotime("+$i days"));
        // }
        $date = Carbon::now();
        $end_date = $date->addDay($package->days);

        ModelsSubscriptions::create([
            'customer' => $request->userid,
            'code' => $reference_number,
            'amount' => $request->amount,
            'package' => $package->id,
            'start_at' => date('Y-m-d H:i:s'),
            'end_at' => $end_date,
            'status' => 'Active'
        ]);

        return redirect()->route('admin.customer')->with('success', 'Package Bought Successfully');
    }
}
