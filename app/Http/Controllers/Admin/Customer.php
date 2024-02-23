<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Customer as ModelsCustomer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Customer extends Controller
{
    public function customer (Request $request) {
        $all_customer = ModelsCustomer::all();

        $context = [
            "all_customer" => $all_customer
        ];
        return view('admin.customer.customer', $context);
    }

    public function create_customer (Request $request) {

        if (isset($request->fake)) {
            $all_customer = ModelsCustomer::create([
                'system_user' => Auth::id(),
                'username' => $request->username,
                'password' => $request->password,
                'phone' => $request->phone,
                'nric' => $request->nric,
                'name' => $request->name,
                'bank_type' => $request->bank_type,
                'bank_number' => $request->bank_number,
                'remark' => $request->remark,
                'parent_user' => $request->parent_user,
                'fake' => true
            ]);
        }
        else {
            $all_customer = ModelsCustomer::create([
                'system_user' => Auth::id(),
                'username' => $request->username,
                'password' => $request->password,
                'phone' => $request->phone,
                'nric' => $request->nric,
                'name' => $request->name,
                'bank_type' => $request->bank_type,
                'bank_number' => $request->bank_number,
                'remark' => $request->remark,
                'parent_user' => $request->parent_user,
                'fake' => false
            ]);
        }
        $context = [
            "all_customer" => $all_customer
        ];
        return redirect()->route('admin.customer')->with('success', 'Customer Created Successfully');
    }

    public function update_customer (Request $request, $id) {

        $customer = ModelsCustomer::find($id);

        if (isset($request->fake)) {
            $all_customer = $customer->update([
                'system_user' => Auth::id(),
                'username' => $request->username,
                'password' => $request->password,
                'phone' => $request->phone,
                'nric' => $request->nric,
                'name' => $request->name,
                'bank_type' => $request->bank_type,
                'bank_number' => $request->bank_number,
                'remark' => $request->remark,
                'parent_user' => $request->parent_user,
                'fake' => true
            ]);
        }
        else {
            $all_customer = $customer->update([
                'system_user' => Auth::id(),
                'username' => $request->username,
                'password' => $request->password,
                'phone' => $request->phone,
                'nric' => $request->nric,
                'name' => $request->name,
                'bank_type' => $request->bank_type,
                'bank_number' => $request->bank_number,
                'remark' => $request->remark,
                'parent_user' => $request->parent_user,
                'fake' => false
            ]);
        }
        $context = [
            "all_customer" => $all_customer
        ];
        return redirect()->route('admin.customer')->with('success', 'Customer Created Successfully');
    }
}
