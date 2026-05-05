<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class HomeController extends Controller
{
    public function home(){
        return view('home');
    }

    public function paypal(Request $request){
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $token = $provider->getAccessToken();

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "purchase_units" => [
                [
                    "amount" => [
                        // "currency_code" => $request->currency,
                        // "value" => $request->amount
                        "currency_code" => $request->currency,
                        "value" => $request->amount,
                    ]
                ]
            ],
            "application_context" => [
                "return_url" => route('payment.success'),
                "cancel_url" => route('payment.cancel'),
            ]
        ]);
        // dd($response);
        if (isset($response['id']) && $response['id'] != null) {
            foreach ($response['links'] as $link) {
                if ($link['rel'] == 'approve') {
                    // return redirect($link['href']);
                    return response()->json([
                        'status' => true,
                        'url' => $link['href']
                    ]);
                }
            }
        }

        // return redirect()->route('payment.cancel');
        return response()->json([
            'status' => false,
            'message' => 'Unable to create PayPal order'
        ]);
    }
}
