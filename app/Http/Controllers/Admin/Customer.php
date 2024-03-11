<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Customer as ModelsCustomer;
use App\Models\Deposit;
use App\Models\Package;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class Customer extends Controller
{
    public function customer (Request $request) {
        $all_customer = ModelsCustomer::orderBy('id', 'DESC')->get();
        $all_package = Package::all();

        $context = [
            "all_customer" => $all_customer,
            "all_package" => $all_package
        ];
        return view('admin.customer.customer', $context);
    }

    public function create_customer (Request $request) {

        try {
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
        } 
        catch (\Exception $e) {
            return Redirect::back()->withErrors(['msg' => 'Customer username can not be created with same username!']);
        }

        $context = [
            "all_customer" => $all_customer
        ];
        return redirect()->route('admin.customer')->with('success', 'Customer Created Successfully');
    }

    public function update_customer (Request $request, $id) {

        $customer = ModelsCustomer::find($id);

        if (isset($request->fake) && isset($request->status)) {
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
                'fake' => true,
                'status' => 'Active'
            ]);
        }
        elseif (isset($request->fake) && !isset($request->status)) {
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
                'fake' => true,
                'status' => 'Inactive'
            ]);
        }
        elseif (!isset($request->fake) && isset($request->status)) {
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
                'fake' => false,
                'status' => 'Active'
            ]);
        }
        elseif (!isset($request->fake) && !isset($request->status)) {
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
                'fake' => false,
                'status' => 'Inactive'
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
                'fake' => false,
                'status' => 'Inactive'
            ]);
        }
        $context = [
            "all_customer" => $all_customer
        ];
        return redirect()->route('admin.customer')->with('success', 'Customer Updated Successfully');
    }
}
