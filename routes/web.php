<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'home']);
Route::post('/payment', [HomeController::class, 'payment'])->name('payment');
Route::get('/success', [HomeController::class, 'paymentSuccess'])->name('payment.success');
Route::get('/fail', [HomeController::class, 'paymentFail'])->name('payment.fail');
Route::get('/cancel', [HomeController::class, 'paymentCancel'])->name('payment.cancel');



