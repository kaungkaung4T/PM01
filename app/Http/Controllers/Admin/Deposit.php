<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Deposit as ModelsDeposit;
use Illuminate\Http\Request;

class Deposit extends Controller
{
    public function deposit (Request $request) {
        $all_deposit = ModelsDeposit::orderBy('id', 'DESC')->get();

        $context = [
            "all_deposit" => $all_deposit
        ];
        return view('admin.deposit.deposit', $context);
    }
}
