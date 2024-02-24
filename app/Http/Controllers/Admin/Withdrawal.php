<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Withdrawal as ModelsWithdrawal;
use Illuminate\Http\Request;

class Withdrawal extends Controller
{
    public function withdrawal (Request $request) {
        $all_withdrawal = ModelsWithdrawal::all();

        $context = [
            "all_withdrawal" => $all_withdrawal
        ];
        return view('admin.withdrawal.withdrawal', $context);
    }
}
