<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function index()
    {
        return view('stripe/stripe');
    }

    public function payment(Request $request)
    {
        $request->validate([
            'name'   => 'required',
            'email'  => 'required|email',
            'phone'  => 'required',
            'amount' => 'required|numeric|min:1',
        ]);

        $secretKey = env('STRIPE_SECRETE_KEY');

        $amount = $request->amount * 100;

        $data = [
            'success_url' => url('/success'),
            'cancel_url'  => url('/cancel'),
            'mode'         => 'payment',

            'line_items[0][price_data][currency]' => 'USD',

            'line_items[0][price_data][product_data][name]' =>
                'Stripe Payment',

            'line_items[0][price_data][unit_amount]' => $amount,

            'line_items[0][quantity]' => 1,

            'customer_email' => $request->email,
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL,
            "https://api.stripe.com/v1/checkout/sessions");

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_POST, true);

        curl_setopt($ch, CURLOPT_POSTFIELDS,
            http_build_query($data));

        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Authorization: Bearer ".$secretKey,
            "Content-Type: application/x-www-form-urlencoded"
        ]);

        $response = curl_exec($ch);

        curl_close($ch);

        $result = json_decode($response, true);

        if(isset($result['id'])){

            return response()->json([
                'status' => true,
                'session_id' => $result['id']
            ]);

        }

        return response()->json([
            'status' => false,
            'message' => $result['error']['message'] ?? 'Payment failed'
        ]);
    }

}
