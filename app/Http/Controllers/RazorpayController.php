<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;

class RazorpayController extends Controller
{
    public function index()
    {
        return view('razorpay');
    }

    public function payment(Request $request)
    {
        $request->validate([
            'name'   => 'required',
            'email'  => 'required|email',
            'phone'  => 'required',
            'amount' => 'required|numeric|min:1',
        ]);

        $api = new Api(
            env('RAZORPAY_KEY'),
            env('RAZORPAY_SECRET')
        );

        $amount = $request->amount * 100;

        $order = $api->order->create([

            'receipt' => 'ORD_' . rand(10000,99999),

            'amount' => $amount,

            'currency' => 'INR'
        ]);

        $data = [

            "key" => env('RAZORPAY_KEY'),

            "amount" => $amount,

            "name" => "Laravel Payment Gateway",

            "description" => "Secure Razorpay Payment",

            "image" => "https://razorpay.com/assets/razorpay-logo.svg",

            "order_id" => $order['id'],

            "prefill" => [
                "name" => $request->name,
                "email" => $request->email,
                "contact" => $request->phone,
            ],

            "theme" => [
                "color" => "#3399cc"
            ]
        ];

        return view('razorpay-checkout', compact('data'));
    }
}
