<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CashfreeController extends Controller
{
    public function index()
    {
        return view('cashfree/cashfree');
    }

    public function payment(Request $request)
    {
        $request->validate([
            'name'   => 'required',
            'email'  => 'required|email',
            'phone'  => 'required',
            'amount' => 'required|numeric|min:1',
        ]);

        $clientId = env('CASHFREE_APP_ID');
        $clientSecret = env('CASHFREE_SECRET_KEY');
        $baseUrl = env('CASHFREE_API_URL');
        $cashfreeMode = env('CASHFREE_MODE');

        $orderId = "ORDER_" . time();
        $data = [
            "order_id" => $orderId,
            "order_amount" => 100,
            "order_currency" => "INR",
            "customer_details" => [
                "customer_id" => "CUST_" . time(),
                "customer_name" => $request->name,
                "customer_email" => $request->email,
                "customer_phone" => $request->phone
            ],
            "order_meta" => [
                "return_url" => route('payment.success')."?order_id={order_id}"
            ]
        ];

        $payload = json_encode($data);

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => $baseUrl . "/orders",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $payload,
            CURLOPT_HTTPHEADER => [
                "Content-Type: application/json",
                "x-client-id: $clientId",
                "x-client-secret: $clientSecret",
                "x-api-version: 2023-08-01"
            ],
        ]);

        $response = curl_exec($curl);

        if (curl_errno($curl)) {
            echo curl_error($curl);
            exit;
        }

        curl_close($curl);

        return json_decode($response, true);

    }

}