<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Withdrawal as ModelsWithdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $withdrawal = ModelsWithdrawal::find($id)->get();
        
        if (isset($request->completed)) {
            $withdrawal->completed_rejected_user = Auth::id();
            $withdrawal->status = $request->completed;
            $withdrawal->complete_date = date('Y-m-d H:i:s');
        }

        if (isset($request->rejected)) {
            $withdrawal->completed_rejected_user = Auth::id();
            $withdrawal->status = $request->rejected;
            $withdrawal->reject_date = date('Y-m-d H:i:s');
        }

        $context = [
            "withdrawal" => $withdrawal
        ];
        return redirect()->route('admin.withdrawal.withdrawal')->with('success', 'Withdrawal Updated Successfully');
    }
}
