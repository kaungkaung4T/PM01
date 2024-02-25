<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscriptions as ModelsSubscriptions;
use Illuminate\Http\Request;

class Subscriptions extends Controller
{
    public function subscriptions (Request $request) {
        $all_subscriptions = ModelsSubscriptions::orderBy('id', 'DESC')->get();

        $context = [
            "all_subscriptions" => $all_subscriptions
        ];
        return view('admin.subscriptions.subscriptions', $context);
    }
}
