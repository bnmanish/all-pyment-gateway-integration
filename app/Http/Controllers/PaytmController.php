<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaytmController extends Controller
{
    public function index()
    {
        return view('paytm/paytm');
    }

    public function payment(Request $request)
    {
        $request->validate([
            'name'   => 'required',
            'email'  => 'required|email',
            'phone'  => 'required',
            'amount' => 'required|numeric|min:1',
        ]);
        return $request->all();
    }

}
