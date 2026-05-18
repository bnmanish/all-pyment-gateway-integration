<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MollieController extends Controller
{
    public function index()
    {
        return view('mollie/mollie');
    }

    public function payment(Request $request)
    {
        $request->validate([
            'name'   => 'required',
            'email'  => 'required|email',
            'phone'  => 'required',
            'amount' => 'required|numeric|min:1',
        ]);

        $apiKey = env('MOLLIE_ACCESS_TOKEN');

        $data = [
            "amount" => [
                "currency" => "EUR",
                "value" => number_format($request->amount, 2, '.', '')
            ],
            "description" => "Test Payment",
            "redirectUrl" => route('payment.success'),
            // "webhookUrl" => route('payment.success'),   // later webhook url will be implemented
            "webhookUrl" => 'https://github.com/bnmanish',   // later webhook url will be implemented
            "metadata" => [
                "name" => $request->name,
                "email" => $request->email
            ]
        ];

        $payload = json_encode($data);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.mollie.com/v2/payments");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Authorization: Bearer " . $apiKey,
            "Content-Type: application/json"
        ]);

        $response = curl_exec($ch);
        $error = curl_error($ch);
        curl_close($ch);
        if ($error) {
            echo "cURL Error: " . $error;
            exit;
        }

        $result = json_decode($response, true);
        if (isset($result['id'])) {
            $checkoutUrl = $result['_links']['checkout']['href'];
            header("Location: " . $checkoutUrl);
            exit;
        } else {
            echo "<pre>";
            print_r($result);
        }
    }
}
