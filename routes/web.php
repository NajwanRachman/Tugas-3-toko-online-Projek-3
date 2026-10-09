
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;

Route::get('/', [ProductController::class, 'index'])
    ->name('home');

Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])
        ->name('register');

    Route::post('/register', [AuthController::class, 'register']);

    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login']);
});

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/keranjang', [CartController::class, 'index'])
        ->name('cart.index');

    Route::post('/keranjang/{id}', [CartController::class, 'add'])
        ->name('cart.add');

    Route::patch('/keranjang/{id}', [CartController::class, 'update'])
        ->name('cart.update');

    Route::delete('/keranjang/{id}', [CartController::class, 'remove'])
        ->name('cart.remove');

    Route::get('/checkout', [CheckoutController::class, 'index'])
    ->name('checkout.index');

    Route::post('/checkout', [CheckoutController::class, 'store'])
    ->name('checkout.store');

    Route::get('/riwayat-pesanan', [OrderController::class, 'index'])
    ->name('orders.index');

    Route::get('/riwayat-pesanan/{id}', [OrderController::class, 'show'])
        ->name('orders.show');
});
