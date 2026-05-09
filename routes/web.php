<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\PayUMoneyController;



Route::get('/', [HomeController::class, 'home']);
// Route::post('/payment', [HomeController::class, 'payment'])->name('payment');
// Route::post('/generate-payuhash', [HomeController::class, 'generatePyuhash'])->name('generate.payuhash');
// paypal routes
Route::get('/paypal', [PayPalController::class, 'index'])->name('paypal');
Route::post('/paypal/payment', [PayPalController::class, 'payment'])->name('paypal.payment');

// payUmoney routes 
Route::get('/payumoney', [PayUMoneyController::class, 'index'])->name('payumoney');
Route::post('/payumoney/payment', [PayUMoneyController::class, 'payment'])->name('payumoney.payment');



// success, fail, cancel
Route::any('/success', [HomeController::class, 'paymentSuccess'])->name('payment.success');
Route::any('/fail', [HomeController::class, 'paymentFail'])->name('payment.fail');
Route::any('/cancel', [HomeController::class, 'paymentCancel'])->name('payment.cancel');



