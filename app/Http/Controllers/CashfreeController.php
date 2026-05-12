<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Cashfree\Cashfree;

use Cashfree\Model\CreateOrderRequest;
use Cashfree\Model\CustomerDetails;
use Cashfree\Model\OrderMeta;

class CashfreeController extends Controller
{
    public function index()
    {
        return view('cashfree');
    }

    public function payment(Request $request)
    {
        $request->validate([
            'name'   => 'required',
            'email'  => 'required|email',
            'phone'  => 'required',
            'amount' => 'required|numeric|min:1',
        ]);

        /*
        |--------------------------------------------------------------------------
        | CASHFREE CONFIG
        |--------------------------------------------------------------------------
        */

        Cashfree::$XClientId =
            env('CASHFREE_APP_ID');

        Cashfree::$XClientSecret =
            env('CASHFREE_SECRET_KEY');

        Cashfree::$XEnvironment =
            env('CASHFREE_ENV') == 'production'
            ? Cashfree::$PRODUCTION
            : Cashfree::$SANDBOX;

        /*
        |--------------------------------------------------------------------------
        | ORDER ID
        |--------------------------------------------------------------------------
        */

        $orderId =
            'ORDER_' . rand(100000,999999);

        /*
        |--------------------------------------------------------------------------
        | CUSTOMER DETAILS
        |--------------------------------------------------------------------------
        */

        $customerDetails =
            new CustomerDetails();

        $customerDetails->setCustomerId(
            'CUST_' . rand(1000,9999)
        );

        $customerDetails->setCustomerName(
            $request->name
        );

        $customerDetails->setCustomerEmail(
            $request->email
        );

        $customerDetails->setCustomerPhone(
            $request->phone
        );

        /*
        |--------------------------------------------------------------------------
        | ORDER META
        |--------------------------------------------------------------------------
        */

        $orderMeta = new OrderMeta();

        $orderMeta->setReturnUrl(
            route('cashfree.success') .
            '?order_id={order_id}'
        );

        /*
        |--------------------------------------------------------------------------
        | CREATE ORDER REQUEST
        |--------------------------------------------------------------------------
        */

        $createOrderRequest =
            new CreateOrderRequest();

        $createOrderRequest->setOrderAmount(
            $request->amount
        );

        $createOrderRequest->setOrderCurrency(
            "INR"
        );

        $createOrderRequest->setOrderId(
            $orderId
        );

        $createOrderRequest->setCustomerDetails(
            $customerDetails
        );

        $createOrderRequest->setOrderMeta(
            $orderMeta
        );

        try {

            $response =
                Cashfree::PGCreateOrder(
                    "2023-08-01",
                    $createOrderRequest
                );

            $paymentSessionId =
                $response[0]['payment_session_id'];

            return view(
                'cashfree-checkout',
                compact('paymentSessionId')
            );

        } catch (\Exception $e) {

            return back()->with(
                'error',
                $e->getMessage()
            );
        }
    }

    public function success(Request $request)
    {
        return view('cashfree-success', [
            'order_id' => $request->order_id
        ]);
    }
}