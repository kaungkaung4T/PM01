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
        $withdrawal = ModelsWithdrawal::find($id);
        
        if (isset($request->completed)) {
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
