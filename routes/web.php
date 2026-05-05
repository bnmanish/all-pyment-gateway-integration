<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'home']);
Route::post('/paypal', [HomeController::class, 'paypal'])->name('paypal.payment');
Route::get('/success', [HomeController::class, 'paymentSuccess'])->name('payment.success');
Route::get('/cancel', [HomeController::class, 'paymentCancel'])->name('payment.cancel');



