<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\WhatsappController;
use Illuminate\Support\Facades\Route;

// Home
Route::get('/', function () {
    $products = \App\Models\Product::where('is_active', true)->limit(8)->get();
    $categories = \App\Models\Category::where('is_active', true)->get();
    return view('welcome', compact('products', 'categories'));
})->name('home');

// Products
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product:slug}', [ProductController::class, 'show'])->name('products.show');
Route::get('/category/{category:slug}', [ProductController::class, 'category'])->name('products.category');

// Cart
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/{product}/add', [CartController::class, 'add'])->name('cart.add');
Route::delete('/cart/{product}/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::patch('/cart/{product}/update', [CartController::class, 'update'])->name('cart.update');

// Checkout & Orders
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
Route::get('/order/success/{order}', [CheckoutController::class, 'success'])->name('order.success');

// Order Tracking (Public)
Route::get('/track-order', [OrderController::class, 'track'])->name('orders.track');

// Authentication
Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'show'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/login', [LoginController::class, 'show'])->name('login');
    Route::post('/login', [LoginController::class, 'store']);
});

// Protected routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    
    // Order Details
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
    
    // Reviews
    Route::post('/products/{product}/reviews', [ReviewController::class, 'store'])->name('reviews.store');
    Route::delete('/reviews/{review}', [ReviewController::class, 'destroy'])->name('reviews.destroy');
});

// WhatsApp
Route::get('/api/whatsapp/config', [WhatsappController::class, 'getConfig'])->name('whatsapp.config');
Route::get('/api/whatsapp/detect', [WhatsappController::class, 'detectCountry'])->name('whatsapp.detect');
Route::post('/api/whatsapp/config', [WhatsappController::class, 'storeConfig'])->name('whatsapp.store');


