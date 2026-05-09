<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PayUMoneyController extends Controller
{
    public function index()
    {
        return view('payumoney');
    }

    public function payment(Request $request)
    {
        $request->validate([
            'name'   => 'required',
            'email'  => 'required|email',
            'phone'  => 'required',
            'amount' => 'required|numeric|min:1',
        ]);

        $key = env('PAYU_MERCHANT_KEY');
        $salt = env('PAYU_MERCHANT_SALT');

        $txnid = 'TXN' . rand(100000,999999);

        $amount = number_format($request->amount, 2, '.', '');

        $productInfo = "Laravel Payment";

        $firstname = $request->name;

        $email = $request->email;

        /*
        |--------------------------------------------------------------------------
        | HASH GENERATION
        |--------------------------------------------------------------------------
        */

        $hashString =
            $key . '|' .
            $txnid . '|' .
            $amount . '|' .
            $productInfo . '|' .
            $firstname . '|' .
            $email . '|||||||||||' .
            $salt;

        $hash = strtolower(hash('sha512', $hashString));

        $payuData = [

            "key" => $key,
            "txnid" => $txnid,
            "amount" => $amount,
            "productinfo" => $productInfo,
            "firstname" => $firstname,
            "email" => $email,
            "phone" => $request->phone,

            "surl" => route('payment.success'),
            "furl" => route('payment.fail'),

            "hash" => $hash,

            // SANDBOX URL
            "action" => env('PAYU_URL')
        ];

        return view('payumoney-redirect', compact('payuData'));
    }

    // public function success(Request $request)
    // {
    //     return view('payumoney-success', [
    //         'response' => $request->all()
    //     ]);
    // }

    // public function failure(Request $request)
    // {
    //     return view('payumoney-failure', [
    //         'response' => $request->all()
    //     ]);
    // }
}
