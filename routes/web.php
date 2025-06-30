<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;

// Product User
Route::get('/', [ProductController::class, 'index']);
Route::get('/catalog', [ProductController::class, 'catalog']);
Route::get('/product/{productId}', [ProductController::class, 'productDetail']);

// Auth Controller
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/signup', [AuthController::class, 'showSignupForm']);
Route::post('/signup', [AuthController::class, 'signup']);


// Cart Route
Route::get('/cart', [CartController::class, 'index']);
Route::post('/cart', [CartController::class, 'store']);
// pending yah rada bingung
Route::put('/cart/{id}', [CartController::class, 'update']);


// Account 
Route::get('/account', [AccountController::class, 'profile'])->middleware('auth');
Route::get('/account/order', [OrderController::class, 'orderUser'])->middleware('auth');
Route::get('/account/order/{orderId}', [OrderController::class, 'orderDetail'])->middleware('auth');
Route::get('/account/profile', [AccountController::class, 'profileForm'])->middleware('auth');  
Route::put('/account/profile', [AccountController::class, 'profileFormUpdate'])->middleware('auth');  
Route::put('/account/profile/avatar', [AccountController::class, 'profileAvatarUpdate'])->middleware('auth');
Route::get('/account/change-password', [AccountController::class, 'changePasswordForm'])->middleware('auth');
Route::put('/account/change-password', [AccountController::class, 'changePasswordUpdate'])->middleware('auth');


// Account Address
Route::get('/account/address', [AddressController::class, 'addressUser'])->middleware('auth');
Route::post('/account/address', [AddressController::class, 'store'])->middleware('auth');
Route::put('/account/address/{address}', [AddressController::class, 'update'])->middleware('auth');

// order Checkout
Route::get('/checkout', [OrderController::class, 'checkoutOrderpage']);
Route::get('/checkout/{orderId}/success', [OrderController::class, 'checkoutOrderSuccessPage']);

// paymment form 
Route::get('/payment/upload/{order}', [OrderController::class, 'showUploadForm'])->middleware('auth');

