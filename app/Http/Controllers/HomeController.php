<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class HomeController extends Controller
{
    public function home(){
        return view('home');
    }

    // public function payment(Request $request){

    //     if($request->gateway == 'paypal'){

    //         $provider = new PayPalClient;
    //         $provider->setApiCredentials(config('paypal'));
    //         $token = $provider->getAccessToken();
    //         $response = $provider->createOrder([
    //             "intent" => "CAPTURE",
    //             "purchase_units" => [
    //                 [
    //                     "amount" => [
    //                         // "currency_code" => $request->currency,
    //                         // "value" => $request->amount
    //                         "currency_code" => $request->currency,
    //                         "value" => $request->amount,
    //                     ]
    //                 ]
    //             ],
    //             "application_context" => [
    //                 "return_url" => route('payment.success'),
    //                 "cancel_url" => route('payment.cancel'),
    //             ]
    //         ]);
    //         // dd($response);
    //         if (isset($response['id']) && $response['id'] != null) {
    //             foreach ($response['links'] as $link) {
    //                 if ($link['rel'] == 'approve') {
    //                     // return redirect($link['href']);
    //                     return response()->json([
    //                         'status' => true,
    //                         'url' => $link['href']
    //                     ]);
    //                 }
    //             }
    //         }

    //     }else if($request->gateway == 'payumoney'){
    //         return $request->all();
    //     }

    //     // return redirect()->route('payment.cancel');
    //     return response()->json([
    //         'status' => false,
    //         'message' => 'Unable to create '.$request->gateway.' order'
    //     ]);
    // }

    // public function generatePyuhash(Request $request){
    //     $key = env('PAYU_MERCHANT_KEY');
    //     $salt = env('PAYU_MERCHANT_SALT');
    //     $txnid = time();
    //     $amount = $request->amount;
    //     $productInfo = "B N Manish";
    //     $firstname = $request->name;
    //     $email = $request->email;
    //     // PAYU HASH STRING
    //     $hashString =
    //         $key . '|' .
    //         $txnid . '|' .
    //         $amount . '|' .
    //         $productInfo . '|' .
    //         $firstname . '|' .
    //         $email . '|||||||||||' .
    //         $salt;
    //     // GENERATE HASH
    //     $hash = strtolower(hash('sha512', $hashString));
    //     return response()->json([
    //         'status' => true,
    //         'key' => $key,
    //         'txnid' => $txnid,
    //         'amount' => $amount,
    //         'productinfo' => $productInfo,
    //         'firstname' => $firstname,
    //         'email' => $email,
    //         'phone' => $request->mobile,
    //         'hash' => $hash,
    //         'surl' => route('payment.success'),
    //         'furl' => route('payment.fail'),
    //     ]);
    // }

    public function paymentSuccess(Request $request){
        // return $request->all();
        return view('success');
    }
    
    public function paymentFail(){
        return view('fail');
    }

    public function paymentCancel(){
        return view('cancel');
    }
}
