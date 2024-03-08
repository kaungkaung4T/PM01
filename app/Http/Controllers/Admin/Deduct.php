<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Deposit;
use Illuminate\Http\Request;

class Deduct extends Controller
{
    public function deduct (Request $request, $id) {
        $customer = Customer::find($id);
        
        $all_deposit = Deposit::find($customer->deposit_amount);
        $all_deposit ->update([
            'amount' => $request->amount
        ]);

        $context = [
            "all_deposit" => $all_deposit
        ];
        return redirect()->route('admin.customer')->with('success', 'Deduct Created Successfully');
    }
}
