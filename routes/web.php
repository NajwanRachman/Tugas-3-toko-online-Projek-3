
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RoleManagementController;

Route::get('/', [ProductController::class, 'index'])
    ->name('home');

Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])
        ->name('register');

    Route::post('/register', [AuthController::class, 'register'])
        ->name('register.store');

    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.store');
});


Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');


Route::middleware(['auth', 'role:customer'])->group(function () {
    Route::get('/keranjang', [CartController::class, 'index'])
        ->name('cart.index');

    Route::post('/keranjang/{id}', [CartController::class, 'add'])
        ->name('cart.add');

    Route::patch('/keranjang/{id}', [CartController::class, 'update'])
        ->name('cart.update');

    Route::delete('/keranjang/{id}', [CartController::class, 'remove'])
        ->name('cart.remove');
});


Route::middleware('auth')->group(function () {
    Route::get('/checkout', [CheckoutController::class, 'index'])
        ->name('checkout.index');

    Route::post('/checkout', [CheckoutController::class, 'store'])
        ->name('checkout.store');

    Route::get('/riwayat-pesanan', [OrderController::class, 'index'])
        ->name('orders.index');

    Route::get('/riwayat-pesanan/{id}', [OrderController::class, 'show'])
        ->name('orders.show');
});

Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/users', [RoleManagementController::class, 'index'])
            ->name('users.index');

        Route::patch('/users/{user}/role', [
            RoleManagementController::class,
            'update',
        ])->name('users.role.update');
    });
