<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RazorpayController extends Controller
{
    public function index()
    {
        return view('razorpay/razorpay');
    }

    public function payment(Request $request)
    {
        $keyId = env('RAZORPAY_KEY');
        $keySecret = env('RAZORPAY_SECRET');
        $name = $_POST['name'];
        $email = $_POST['email'];
        $amount = $_POST['amount'] * 100; // paisa
        //--------------------------------------
        // CREATE ORDER USING CURL
        //--------------------------------------
        $orderAPIUrl = env('RAZORPAY_ORDER_API');

        $data = [
            "amount" => $amount,
            "currency" => "INR",
            "receipt" => "BN-".time(),
            "payment_capture" => 1
        ];
        $payload = json_encode($data);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $orderAPIUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERPWD, $keyId . ":" . $keySecret);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Content-Type: application/json"
        ]);
        $response = curl_exec($ch);
        // return $response;
        curl_close($ch);
        $order = json_decode($response, true);
        $orderId = $order['id'];

        return ['amount'=>$amount,'orderId'=>$orderId,'name'=>$name,'email'=>$email];

        // return view('razorpay-checkout', compact('data'));
        // return view('razorpay/checkout',['keyId'=>$keyId,'amount'=>$amount,'orderId'=>$orderId,'name'=>$name,'email'=>$email]);
    }
}
