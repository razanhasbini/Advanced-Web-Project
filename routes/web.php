<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ContactController;
// Checkout routes
// Show the checkout page
Route::get('/checkout', [CheckoutController::class, 'showCheckout'])->name('checkout.index');


// In routes/web.php
Route::post('/checkout/confirm', [CheckoutController::class, 'processCheckout'])->name('checkout.confirm');

Route::get('/', function () {
    return view('home');
});
Route::get('/checkout', [CheckoutController::class, 'showCheckout'])->name('checkout.index');

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/services', function () {
    return view('services');
});

Route::get('/products', function () {
    return view('products');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/products', [ProductController::class, 'index'])->name('products');





Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove'); // Remove item from cart
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add'); // Add item to cart
Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view'); // View cart
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update'); // Update cart item

