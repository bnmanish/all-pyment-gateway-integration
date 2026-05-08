<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'home']);
Route::post('/payment', [HomeController::class, 'payment'])->name('payment');
Route::post('/generate-payuhash', [HomeController::class, 'generatePyuhash'])->name('generate.payuhash');
Route::any('/success', [HomeController::class, 'paymentSuccess'])->name('payment.success');
Route::any('/fail', [HomeController::class, 'paymentFail'])->name('payment.fail');
Route::any('/cancel', [HomeController::class, 'paymentCancel'])->name('payment.cancel');



