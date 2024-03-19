<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;

class Index extends Controller
{
    public function index (Request $request) {

        $packages = Package::all();

        $context = [
            'packages' => $packages 
        ];

        return view('front_end.index', $context);
    }
}
