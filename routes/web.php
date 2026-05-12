<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\PayUMoneyController;
use App\Http\Controllers\RazorpayController;
use App\Http\Controllers\CashfreeController;


Route::get('/', [HomeController::class, 'home']);
// Route::post('/payment', [HomeController::class, 'payment'])->name('payment');
// Route::post('/generate-payuhash', [HomeController::class, 'generatePyuhash'])->name('generate.payuhash');
// paypal routes
Route::get('/paypal', [PayPalController::class, 'index'])->name('paypal');
Route::post('/paypal/payment', [PayPalController::class, 'payment'])->name('paypal.payment');

// payUmoney routes 
Route::get('/payumoney', [PayUMoneyController::class, 'index'])->name('payumoney');
Route::post('/payumoney/payment', [PayUMoneyController::class, 'payment'])->name('payumoney.payment');

// Razorpay
Route::get('/razorpay', [RazorpayController::class, 'index'])->name('razorpay');
Route::post('/razorpay/payment', [RazorpayController::class, 'payment'])->name('razorpay.payment');

// Cashfree
Route::get('/cashfree', [CashfreeController::class, 'index'])->name('cashfree');
Route::post('/cashfree/payment', [CashfreeController::class, 'payment'])->name('cashfree.payment');
Route::get('/cashfree/success', [CashfreeController::class, 'success'])->name('cashfree.success');

// success, fail, cancel
Route::any('/success', [HomeController::class, 'paymentSuccess'])->name('payment.success');
Route::any('/fail', [HomeController::class, 'paymentFail'])->name('payment.fail');
Route::any('/cancel', [HomeController::class, 'paymentCancel'])->name('payment.cancel');
