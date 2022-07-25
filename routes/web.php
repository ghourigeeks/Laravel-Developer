<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PaymentController;


Route::get('/', function () {
    return view('auth/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::group(['middleware' => ['auth']], function() {

Route::resource('/customers', CustomerController::class);

Route::get('/payment', [PaymentController::class, 'index'])->name('payment');

Route::post('/charge', [PaymentController::class, 'charge'])->name('charge');

Route::get('/success', [PaymentController::class, 'success'])->name('success');

Route::get('/error', [PaymentController::class, 'error'])->name('error');

});

